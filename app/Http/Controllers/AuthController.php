<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateInfoRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\UserResource;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
   public function register(RegisterRequest $request){
    $user =User::create([
        'first_name'=> $request -> input (key:'first_name'),
        'last_name'=> $request -> input (key:'last_name'),
        'email'=> $request -> input (key:'email'),
        'password'=> Hash::make($request -> input (key:'password')),
        'role_id'=> 1
    ]);

    return response(new UserResource($user), Response::HTTP_CREATED);
   }

   public function login (Request $request){
  if(!Auth::attempt($request->only('email','password'))){
    return \response([
        'error'=> 'invalid credentials'
    ],Response:301);
  }

 /** @var User $user */
 $user = Auth::user();

 $jwt = $user->createToken('token')->plainTextToken;

 $cookie = cookie('jwt', $jwt, 60 * 24);

 return \response([
     'jwt' => $jwt
 ])->withCookie($cookie);

   }
   public function user(Request $request){
    $user = $request->user();

    return new UserResource($user->load('role'));
   }

   public function logout()
   {
       $cookie = \Cookie::forget('jwt');

       return \response([
           'message' => 'success'
       ])->withCookie($cookie);
   }

   public function updateInfo(UpdateInfoRequest $request)
   {
       $user = $request->user();

       $user->update($request->only('first_name', 'last_name', 'email'));

       return \response(new UserResource($user), Response::HTTP_ACCEPTED);
   }
   public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = $request->user();

        $user->update([
            'password' => Hash::make($request->input('password'))
        ]);

        return \response(new UserResource($user), Response::HTTP_ACCEPTED);
    }
}
