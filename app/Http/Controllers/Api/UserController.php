<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStatusUserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = $this->userRepo->getAllUser();

            return response()->json([
                'users' => UserResource::collection($users),
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusUserRequest $request, $id)
    {
        try {
            if ($request->validator->fails()) {
                return response([
                    'status' => 'error',
                    'error' => $request->validator->errors(),
                ], 422);
            }

            $this->userRepo->updateStatusUser($id, $request->status);
            $user = $this->userRepo->getUser($id);

            return response()->json([
                'message' => __('Update success'),
                'user' => new UserResource($user),
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }
}
