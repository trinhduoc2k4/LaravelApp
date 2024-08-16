<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Post;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Owner;
use App\Models\Comment;
use App\Models\Mechanic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        for($i = 1; $i < 10; $i++) {
            Role::query()->create([
                'name' => fake()->text(25)
            ]);
        }

        DB::table('role_user')->insert([
            ['user_id' => 5, 'role_id' => 1],
            ['user_id' => 5, 'role_id' => 3],
            ['user_id' => 5, 'role_id' => 4],
            ['user_id' => 5, 'role_id' => 7],
            ['user_id' => 7, 'role_id' => 9],
            ['user_id' => 7, 'role_id' => 1],
            ['user_id' => 7, 'role_id' => 5],
            ['user_id' => 7, 'role_id' => 6]
        ]);
    }
}
