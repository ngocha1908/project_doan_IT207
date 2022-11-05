<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\BaseRepository;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function getModel()
    {
        return Role::class;
    }
    public function getRole($id)
    {
        return $this->model::findOrFail($id);
    }

    public function getRoleName($id)
    {
        return $this->model->findOrFail($id)->name;
    }
}
