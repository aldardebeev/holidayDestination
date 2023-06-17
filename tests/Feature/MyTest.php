<?php

namespace Tests\Feature;

use App\Models\Destination_user;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class MyTest extends TestCase
{
    public function test_addDestination()
    {
        $destination_id = 1;
        $user = 1;

        Destination_user::create([
            "destination_id" => $destination_id,
            "user_id" => $user
        ]);

        $this->assertDatabaseHas('destination_user', [
            'destination_id' => '1',
            'user_id' => '1',

        ]);
    }

}
