<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateStatusTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_user_can_create_statuses()
    {
        $this->withoutExceptionHandling();
        // 1. Given => Teniendo un usuario autenticado
        $user = factory(User::class)->create();
        $this->actingAs($user);

        // 2. When => Cuando hace un post request a status
        $this->post(route('statuses.store'), ['body' => 'Mi primer status']);

        // 3. Then => Entonces veo un nuevo estado en la base de datos
        $this->assertDatabaseHas('statuses', [
            'body' => 'Mi primer status'
        ]);
    }
}
