<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i<10; $i++)
        {
            Song::create([
                'song_title' => $faker->words(3, true),
                'artist' => $faker->name($gender = 'male' | 'female'), 
                'genre' => $faker->word,
                'composer' => $faker->name,
                'year_released' => $faker->year
            ]);
        }
    }
}
