<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Course;
use App\Models\Platform;
use App\Models\Series;
use App\Models\Topic;
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
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('12345'),
        ]);

        // Create series
        $series = ['Laravel', 'PHP', 'Livewire', 'Vue.js', 'Alpine.js'];
        foreach ( $series as $item ) {
            Series::create([
                'name' => $item,
            ]);
        }

        // Create topics
        $topics = ['Eloquent', 'Validation', 'Authentication', 'Testing', 'Refactoring'];
        foreach ( $topics as $topic ) {
            Topic::create([
                'name' => $topic,
            ]);
        }

        // Create platforms
        $platforms = ['Laracast', 'Youtube', 'Laravel Daily', 'Codecourse', 'Spatie'];
        foreach ( $platforms as $platform ) {
            Platform::create([
                'name' => $platform,
            ]);
        }

        $authors = ['Rasel Ahmed', 'Shahidul Islam', 'Sagor Ahmed'];
        foreach ($authors as $author) {
            Author::create([
                'name' => $author,
            ]);
        }

        // Create 100 courses
        Course::factory(100)->create();

        // Add courses topics and Series
        $courses = Course::all();
        foreach ($courses as $course) {
            // Relationship with Topic data 
            $topics = Topic::all()->random(rand(1, 5))->pluck('id')->toArray();
            $course->topics()->attach($topics);
            // Relationship with Series data 
            $series = Series::all()->random(rand(1, 5))->pluck('id')->toArray();
            $course->series()->attach($series);
            // Relationship with authors data
            $authors = Author::all()->random(rand(1, 3))->pluck('id')->toArray();
            $course->authors()->attach($authors);
        }
    }
}