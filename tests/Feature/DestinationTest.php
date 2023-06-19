<?php

namespace Tests\Feature;

use App\Models\Destination;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestinationTest extends TestCase
{
    use RefreshDatabase;

    public function testAddDestination()
    {
        $user = User::factory()->create();
        $destination = Destination::factory()->create();
        $response = $this->actingAs($user)
            ->post('api/add-destination', ['destination_id' => $destination->id]);
        $response->assertStatus(200);
        $this->assertTrue($user->destinations->contains($destination));
    }
}
