<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\User\UserRepositoryInterface;

class RegisterController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function register(RegisterRequest $request)
    {
        try {
            if ($request->validator->fails()) {
                return response([
                    'error' => $request->validator->errors(),
                ], 422);
            }

            $this->userRepo->create([
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'fullname' => $request->input('fullname'),
                'phone' => $request->input('phone'),
            ]);

            return response()->json([
                'message' => __('Register success'),
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'message' => __('Register Fail'),
                'error' => $error,
            ], 500);
        }
    }
}
