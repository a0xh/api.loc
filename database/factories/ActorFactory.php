<?php declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use App\Application\Models\{Actor, User};
use Illuminate\Support\Collection;
use Faker\Generator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ActorFactory extends Factory
{
    protected $model = Actor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = collect(User::get('id')->all())->random()->toArray();

        return [
            'avatar' => UploadedFile::fake()->image(
                uniqid() . '.jpg', 50, 50)->store(date('Y-m')
            ),
            'name' => fake()->name(),
            'slug' => fake()->slug(2, false),
            'country' => fake()->country(),
            'birthday' => fake()->date('Y-m-d', '1996-08-10'),
            'status' => fake()->randomElement(['active', 'inactive']),
            'is_deleted' => fake()->boolean(),
            'user_id' => $user['id']
        ];
    }
}
