<?php declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Application\Models\Film;
use Illuminate\Http\UploadedFile;
use Faker\Generator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class FilmFactory extends Factory
{
    protected $model = Film::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => str_replace('.', '', fake()->text(65)),
            'slug' => fake()->unique()->slug(3, false),
            'description' => fake()->realText(100, 1),
            'keywords' => fake()->text(100),
            'content' => fake()->paragraph(),
            'rating' => fake()->latitude(0.0, 9.0),
            'duration' => fake()->time(),
            'status' => fake()->randomElement(['active', 'inactive']),
            'is_deleted' => fake()->boolean()
        ];
    }
}
