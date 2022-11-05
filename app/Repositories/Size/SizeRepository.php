<?php

namespace App\Repositories\Size;

use App\Models\Size;
use App\Repositories\BaseRepository;

class SizeRepository extends BaseRepository implements SizeRepositoryInterface
{
    public function getModel()
    {
        return Size::class;
    }
    public function getSize($id)
    {
        return $this->model::where('product_id', $id)->get();
    }

    public function insert($attributes = [])
    {
        return $this->model::insert($attributes);
    }

    public function getSizeName($id)
    {
        return $this->model->findOrFail($id)->name;
    }

    public function getSizeByProductId($id, $size)
    {
        return $this->model->where('product_id', $id)
            ->where('size', $size)
            ->first();
    }

    public function getSizeExistByProductId($id)
    {
        return $this->model
            ->where('product_id', $id)
            ->where('quantity', '>', config('app.zero'))
            ->get();
    }
}
