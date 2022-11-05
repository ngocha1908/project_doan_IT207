<?php

namespace App\Repositories\Size;

use App\Repositories\RepositoryInterface;

interface SizeRepositoryInterface extends RepositoryInterface
{
    public function getSize($id);
    public function insert($attributes = []);
    public function getSizeName($id);
    public function getSizeByProductId($id, $size);
}
