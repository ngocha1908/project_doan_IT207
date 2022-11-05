<?php

namespace App\Repositories\Image;

use App\Models\Image;
use App\Repositories\BaseRepository;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{
    public function getModel()
    {
        return Image::class;
    }
    public function getImage($id)
    {
        return $this->model::where('product_id', $id)->get();
    }

    public function insert($attributes = [])
    {
        return $this->model::insert($attributes);
    }

    public function getImageName($id)
    {
        return $this->model->findOrFail($id)->name;
    }

    public function getFirstImage($id)
    {
        return $this->model->where('product_id', $id)->first();
    }
}
