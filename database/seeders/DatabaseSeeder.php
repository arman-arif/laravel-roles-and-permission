<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            PostSeeder::class
        ]);

        Tag::insert([
            ['name' => 'tutorial', 'slug' => Str::slug('tutorial')],
            ['name' => 'practicle', 'slug' => Str::slug('practicle')],
            ['name' => 'web technology', 'slug' => Str::slug('web technology')],
        ]);
    }
}
