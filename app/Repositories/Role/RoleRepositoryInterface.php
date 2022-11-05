<?php

namespace App\Repositories\Role;

use App\Repositories\RepositoryInterface;

interface RoleRepositoryInterface extends RepositoryInterface
{
    public function getRole($id);

    public function getRoleName($id);
}
