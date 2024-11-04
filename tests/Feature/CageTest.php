<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AddToCartTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authorized_user_can_add_cage()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
        ->post(route('cages.store'),[
            'name'=>'Savannah',
            'capacity'=>5
        ])
        ->assertRedirect(route('cages.index'))
        ->assertSessionHas('success');
        $this->assertDatabaseHas('cages', ['name' => 'Savannah']);
    }
}
