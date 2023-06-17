<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Destination;
use App\Models\Destination_user;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserDestinationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function addDestination(AddUserDestinationRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();

        $destination = Destination::find($data['destination_id']);
        $user->destinations()->attach($destination);

        return response()->json(['success' => true]);
    }

    public function createUser(CreateUserRequest $request)
    {
        $data = $request->all();
        return response()->json(['data' => User::create($data)]);
    }

    public function getFavorites()
    {
        $user = Auth::user();
        $destinations = $user->destinations()->get();
        return response()->json(['data' => $destinations]);
    }

}
