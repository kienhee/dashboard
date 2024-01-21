<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('commons')->insert([
                'cover' => $faker->imageUrl(),
                'images' => json_encode([$faker->imageUrl(), $faker->imageUrl()]),
                'name' => $faker->name,
                'slug' => $faker->slug,
                'column1' => $faker->word,
                'column2' => $faker->word,
                'text' => $faker->paragraph,
                'image_meta' => $faker->imageUrl(),
                'title_meta' => $faker->sentence,
                'description_meta' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
