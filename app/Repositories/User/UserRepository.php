<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function getUser($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getAllUser()
    {
        return $this->model->orderBy('id', 'DESC')->paginate(config('app.pagination.userPagination'));
    }

    public function updateStatusUser($id, $data)
    {
        $user = $this->model->findOrFail($id);

        $user->status = $data;
        $user->update();
    }

    public function getAdmins()
    {
        $users =  $this->model->where('role_id', config('auth.roles.admin'))->get();

        return $users;
    }

    public function findUserByEmail($email)
    {
        $user = $this->model->where('email', $email)->first();

        return $user;
    }
}
