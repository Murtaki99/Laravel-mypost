<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'     => 'Murtaki',
            'username' => 'admin',
            'email'    => 'murtakibangko@gmail.com',
            'password' => bcrypt('123456')
        ]);
        User::factory(10)->create();
        Post::factory(20)->create();
        Category::create([
            'name' => 'Programing',
            'slug' => 'programing'
        ]);
        Category::create([
            'name' => 'Web Developer',
            'slug' => 'web-developer'
        ]);
        Category::create([
            'name' => 'Web Desain',
            'slug' => 'web-desain'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
    }
}
