<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//CREATE A USER
Route::post('/users/create', function (Request $request) {
    $data = $request->all();

    if (!User::where('email', '=', $data['email'])->exists()) {
        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"])
        ]);

        if (empty($user->id)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "An unexpected error has occured"
                ]
            ];
        } else {
            return [
                "success" => true,
                "response" => [
                    "user" => $user
                ]
            ];
        }
    } else {
        return [
            "success" => false,
            "response" => [
                "error" => "The user already exists"
            ]
        ];
    }
});

// GET ALL USERS
Route::get('/users/all', function () {
    $users = User::all();

    if (empty($users)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No users found"
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "users" => $users
        ]
    ];
});

// GET A SINGLE USER (BY ID)
Route::get('/users/{id}', function (Request $request, $id) {
    $user = User::find($id);

    if (empty($user)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No user found"
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "user" => $user
        ]
    ];
});

// DELETE USER
Route::delete('/users/delete/{id}', function (Request $request, $id) {
    $user = User::find($id);

    if (empty($user)) {
        $success = false;
        $response = ["error" => "User could not be deleted"];
    } else {
        $success = $user->delete();
        $response = ["message" => "User deleted!"];
    }

    return ["success" => $success, "response" => $response];
});

// UPDATE USER
Route::put('/users/update/{id}', function (Request $request, $id) {
    $data = $request->all();

    $user = User::find($id);

    foreach ($data as $key => $value) {
        $user->{$key} = $value;
    }

    $result = $user->save();

    return ["success" => $result, "response" => ["user" => $user]];
});