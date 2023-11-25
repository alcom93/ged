<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DocumentUserPermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'document_id' => function() {
                return Document::query()->inRandomOrder()->first()->id;
            },
            'user_id' => function() {
                return User::query()->inRandomOrder()->first()->id;
            },
            'permission_id' => function() {
                return Permission::query()->inRandomOrder()->first()->id;
            },
        ];
    }
}
