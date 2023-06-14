<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

class DestinationController extends Controller
{
    public function list()
    {
        $data = Destination::all();
        return response()->json(['data' => $data]);
    }

    public function create ()
    {

    }
}