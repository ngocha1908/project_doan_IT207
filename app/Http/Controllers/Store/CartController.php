<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\PaymentRequest;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderProduct\OrderProductRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Size\SizeRepositoryInterface;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $productRepo;
    protected $sizeRepo;
    protected $imageRepo;
    protected $orderRepo;
    protected $orderProductRepo;

    public function __construct(
        ProductRepositoryInterface $productRepo,
        SizeRepositoryInterface $sizeRepo,
        ImageRepositoryInterface $imageRepo,
        OrderRepositoryInterface $orderRepo,
        OrderProductRepositoryInterface $orderProductRepo
    ) {
        $this->productRepo = $productRepo;
        $this->sizeRepo = $sizeRepo;
        $this->imageRepo = $imageRepo;
        $this->orderRepo = $orderRepo;
        $this->orderProductRepo = $orderProductRepo;
    }

    public function cart()
    {
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        $data['priceTotal'] = Cart::priceTotal();

        return view('store.cart.cart', $data);
    }

    public function addToCart(AddToCartRequest $request)
    {
        $qty = $request->quantity ? $request->quantity : 1;
        $size = $request->size;
        $product = $this->productRepo->getProduct($request->id);

        $prd_size = $this->sizeRepo->getSizeByProductId($product->id, $size);

        if ($qty > $prd_size->quantity) {
            return redirect()
                ->back()
                ->with('messages', __('The quantity of products in size :size is only :quantity', [
                    'size' => strtoupper($size),
                    'quantity' => $prd_size->quantity
                ]));
        }

        $image = $this->imageRepo->getFirstImage($request->id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => $qty,
            'weight' => 0,
            'options' => [
                'code' => $product->code,
                'size' => $size,
                'image' => $image->name,
            ],
        ]);

        return redirect()->route('cart.showCart');
    }

    public function update($rowId, $qty)
    {
        if ($qty > config('app.qty.max') || $qty < config('app.qty.min')) {
            return config('app.updateCart.fail');
        }
        Cart::update($rowId, $qty);

        return config('app.updateCart.success');
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);

        return redirect()->route('cart.showCart');
    }

    public function checkout()
    {
        $data['cart'] = Cart::content();
        $data['priceTotal'] = Cart::priceTotal();

        foreach ($data['cart'] as $item) {
            $product = $this->productRepo->getProduct($item->id);
            $size = $this->sizeRepo->getSizeByProductId($item->id, $item->options->size);

            if ($size->quantity < $item->qty) {
                $item->qty = $size->quantity;

                return redirect()
                    ->back()
                    ->with('messages', __('The quantity of product :product is only :quantity', [
                        'product' => $product->name,
                        'quantity' => $size->quantity
                    ]));
            }
        }

        return view('store.cart.checkout', $data);
    }

    public function payment(PaymentRequest $request)
    {
        $total = str_replace(',', '', Cart::priceTotal());

        $this->orderRepo->create([
            'user_id' => Auth::user()->id,
            'total_price' => $total,
            'address' => $request->address,
            'status' => config('app.orderStatus.pending'),
            'phone' => $request->phone,
            'note' => $request->note,
        ]);

        $order = $this->orderRepo->getOrderbyUserId(Auth::user()->id);

        foreach (Cart::content() as $cart) {
            $this->orderProductRepo->create([
                'product_id' => $cart->id,
                'order_id' => $order->id,
                'quantity' => $cart->qty,
                'size' => $cart->options->size,
            ]);

            $size = $this->sizeRepo->getSizeByProductId($cart->id, $cart->options->size);
            $qty = $size->quantity - $cart->qty;
            $this->sizeRepo->update(
                $size->id,
                [
                    'quantity' => $qty,
                ]
            );
        }

        return redirect()->route('cart.complete', $order->id);
    }

    public function complete($id)
    {
        $order = $this->orderRepo->getOrderWithUser($id);
        $order_products = $this->orderProductRepo->getOrderProduct($order->id);
        $products = $order->products;
        Cart::destroy();

        return view("store.cart.complete")->with(compact('order', 'order_products', 'products'));
    }
}
