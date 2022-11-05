<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Repositories\Comment\CommentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct(CommentRepositoryInterface $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function comment(CommentRequest $request)
    {
        $this->commentRepo->create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'content' => $request->content,
        ]);

        return redirect()->back();
    }
}
