<?php declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use App\Application\Models\{Genre, User};
use Faker\Generator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class GenreFactory extends Factory
{
    protected $model = Genre::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = collect(User::get('id')->all())->random()->toArray();
        
        return [
            'title' => str_replace('.', '', fake()->text(65)),
            'slug' => fake()->slug(3, false),
            'description' => fake()->realText(100, 1),
            'keywords' => fake()->text(100),
            'content' => fake()->paragraph(),
            'status' => fake()->randomElement(['active', 'inactive']),
            'is_deleted' => fake()->boolean(),
            'user_id' => $user['id']
        ];
    }
}
