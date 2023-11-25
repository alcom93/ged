<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(3),
            'description' => $this->faker->text(),
            'path'=>'/dossier/'. $this->faker->word().'.'.fake()->fileExtension(),
            'category_id' =>  function() {
                return Category::query()->inRandomOrder()->first()->id;
            },
            
            'created_by' => function() {
                return User::query()->inRandomOrder()->first()->id;
            },
            'source'=>fake()->company(),
            'access'=>fake()->randomElement(['private','public']),
        ];
    }
}
