<?php

namespace Tests\Feature;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CityTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase, WithFaker;
    
    public function test_create_city()
    {
        $admin = Admin::find(1);

        $response = $this->actingAs($admin)->post(route('admin.cities.store'), [
            'id' => 3,
            'title' => 'New City',
            'country_id' => 19
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('cities', [
            'id' => 3,
            'title' => 'New City',
            'country_id' => 19,
        ]);

        $this->assertEquals(1,Task::all()->count());


    }
}
