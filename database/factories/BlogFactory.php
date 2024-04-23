<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fakeImage = UploadedFile::fake()->image('1713803113_Screenshot from 2024-04-22 20-33-02.png');
        return [
            'title' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(2),
            'image' => $fakeImage, // Or set a default image path if applicable
            'status' => rand(1, 2), // Random status (e.g., published, draft)
            'created_at' => $this->faker->dateTimeThisMonth('-1 days'),  // Create blog post from yesterday
        ];
    }

    public function withImage()
    {
        return $this->state([
            'image' => $this->faker->imageUrl(250, 250), // Generate random image URL
        ]);
    }
}
