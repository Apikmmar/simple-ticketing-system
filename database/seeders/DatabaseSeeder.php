<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $now = now();
        DB::table('users')->insert([
            ['name' => 'afiq ammar', 'email' => 'apik@gmail.com', 'password' => Hash::make('password'), 'role' => 'staff', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'ammar afiq', 'email' => 'ammar@gmail.com', 'password' => Hash::make('password'), 'role' => 'guest', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('tickets')->insert([
            ['user_id' => 2,'number' => 1001,'status' => 'done','created_at' => $now,'updated_at' => $now],
            ['user_id' => 2,'number' => 1002,'status' => 'done','created_at' => $now,'updated_at' => $now],
            ['user_id' => 2,'number' => 1003,'status' => 'now','created_at' => $now,'updated_at' => $now],
            ['user_id' => 2,'number' => 1004,'status' => 'waiting','created_at' => $now,'updated_at' => $now],
            ['user_id' => 2,'number' => 1005,'status' => 'waiting','created_at' => $now,'updated_at' => $now],
        ]);
    }
}
