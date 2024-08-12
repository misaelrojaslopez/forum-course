<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Reply;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create([
            'email' => 'misa.rojas86@gmail.com'
        ]);
        User::factory(9)->create();

        Category::factory(10)
            ->hasThreads(20)
            ->create();

        Reply::factory(400)->create();

    }
}
