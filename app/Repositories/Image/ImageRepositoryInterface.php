<?php

namespace App\Repositories\Image;

use App\Repositories\RepositoryInterface;

interface ImageRepositoryInterface extends RepositoryInterface
{
    public function getImage($id);

    public function insert($attributes = []);

    public function getImageName($id);

    public function getFirstImage($id);
}
