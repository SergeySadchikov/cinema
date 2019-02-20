<?php

namespace App\Api\V1\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\RegisterRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Role;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = new User($request->all());
        if (! $user->save()) {
            throw new HttpException(500);
        }
        $roleId = Role::find(2)->id;
        $user->roles()->attach($roleId);
        return response()->json([
            'status' => 'ok',
        ], 201);
    }
}
