<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

$array = ['/storage/foto.jpg', '/storage/Imagen.jpg', '/storage/.jpg'];

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $array = ['/storage/foto.jpg', '/storage/Imagen.jpg', '/storage/publicacion.jpg'];

        return [
            'user_id' => User::factory(),
            'title' => $this->faker->jobTitle(),
            'content' => $this->faker->paragraph(rand(1,2)),
            'url' => $array[array_rand($array)] // Selecciona una URL aleatoria del array
        ];
    }
}
