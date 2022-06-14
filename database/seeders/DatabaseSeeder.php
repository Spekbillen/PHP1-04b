<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Subsection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Subsection::factory()->create([
            'name'=> 'WTF'
        ]);

        Subsection::factory()->create([
            'name'=> 'Latest News'
        ]);

        Subsection::factory()->create([
            'name'=> 'Funny'
        ]);

        Subsection::factory()->create([
            'name'=> 'Politics'
        ]);

        Subsection::factory()->create([
            'name'=> 'Random'
        ]);

        Subsection::factory()->create([
            'name'=> 'Animals'
        ]);

        Subsection::factory()->create([
            'name'=> 'Awsome'
        ]);

        Subsection::factory()->create([
            'name'=> 'Car'
        ]);

        Subsection::factory()->create([
            'name'=> 'Meme'
        ]);

        Subsection::factory()->create([
            'name'=> 'Savage'
        ]);

        Post::factory(50)->create();
        Comment::factory(500)->create();
        $this->call(LaratrustSeeder::class);

    }
}
