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
// Только авторизованнный может зайти 

// Не авторизован не позволить создать клетку

// Авиторизован -  создание клетки

// авто сбросс бд RefreshDatabase

// Нужен авторизованный пользователь

// фабрики создание пользователя User::factory()->create() и actingAs($user) - авторизация

// необходимые разрешения(add cage)

// Пост запрос к cages.store (name capacity)

// проверка что в бд

// исп assertDatabaseHas

// звпуск
