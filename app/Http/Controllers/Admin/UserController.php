<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $users = $this->userRepo->getAllUser();

        return view('admin.users.listuser')->with(compact('users'));
    }

    public function edit($id)
    {
        $user = $this->userRepo->getUser($id);

        return view('admin.users.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->status;
        $this->userRepo->updateStatusUser($id, $data);

        return redirect()->route('admin.users.index')->with('success', 'Update success');
    }
}
