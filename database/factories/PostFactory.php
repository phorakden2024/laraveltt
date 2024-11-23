<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;

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
        $thumbnail = ['database.png', 'node.png', 'php.png', 'programming.jpg', 'python.jpeg'];
        $categories = Category::pluck('id')->toArray();
        return [
            'user_id' => 1,
            'title' => fake()->sentence(),
            'content' => fake()->text(),
            'thumbnail' => 'uploads/' .fake()->randomElement($thumbnail),
            'category_id' => fake()->randomElement($categories),

        ];
    }
    public function configure()
    {
        $tags = Tag::pluck('id')->toArray();
        return $this->afterCreating(function (Post $post) use($tags) {
            $post->tags()->sync(fake()->randomElements($tags,2));
        });
    }
}
