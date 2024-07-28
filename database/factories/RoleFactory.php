<?php declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Application\Models\Role;
use Faker\Generator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class RoleFactory extends Factory
{
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => str()->substr(fake()->unique()->jobTitle(), 0, 44),
            'slug' => fake()->unique()->slug(1, false),
            'is_deleted' => fake()->boolean(),
            'data' => []
        ];
    }
}
