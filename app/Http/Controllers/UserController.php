<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Destination;
use App\Models\Destination_user;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function store(CreateRequest $request)
    {
        $user = Auth::user();
        $id = $user->id;
        $data = $request->all();
        $count = DB::table('destination_user')->where('user_id', '=', $id)->count();

        $favorites = DB::table('destination_user')->select('destination_id')->where('user_id', '=',  $id)->get();

        $destinations = [];

        foreach ($favorites as $favorite) {
            $destination = DB::table('destination_user')->select('destination_id')->where('user_id', '=',  $id)->first();
            if ($destination) {
                $destinations[] = $destination->destination_id;
            }
        }

        if($count < 3 && !in_array($data['destination_id'] ,$destinations)) {
            Destination_user::create(['user_id' => $id, 'destination_id' => $data['destination_id']]);
            return response()->json(['success']);
        }
        elseif (in_array($data['destination_id'] ,$destinations)){
            return response()->json(['this place already exists']);
        }

        else {
            return response()->json(['too many places']);
        }

    }
    public function post(CreateUserRequest $request)
    {
        $data = $request->all();
        return response()->json(['data' => User::create($data)]);

    }


    public function get($id)
    {
        $favorites = DB::table('destination_user')->select('destination_id')->where('user_id', '=', $id)->get();

        $destinations = [];

        foreach ($favorites as $favorite) {
            $destination = DB::table('destinations')->select('name')->where('id', '=', $favorite->destination_id)->first();
            if ($destination) {
                $destinations[] = $destination->name;
            }
        }
        return response()->json(['data' => $destinations]);
    }


}
