<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $ingredients = Ingredient::factory(rand(4,5))->create();
        User::factory(10)->create()->each(function($user) use ($ingredients) {
            Recipe::factory(2)->create(['user_id'=>$user->id])->each(function ($recipe) use ($ingredients) {
                $recipe->ingredients()->attach($ingredients->random(3),[
                    'amount' => fake()->numberBetween(10,100),
                    'unit' => 'cl'
                ]);
            });
        });

        User::factory(10)->has(
            Recipe::factory(2)->hasAttached(
                Ingredient::factory(rand(4,5)),
                [
                    'amount' => fake()->numberBetween(10,100),
                    'unit' => 'cl'
                ]
            ),
        )->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
