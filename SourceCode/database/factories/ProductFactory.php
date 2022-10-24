<?php

namespace Database\Factories;
use Faker\Factory as Faker;
use Faker\Provider\ar_EG\Text;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        /*
        $table->id();
            $table->string('product_name');
            $table->decimal('price');
            $table->text('description');
            $table->decimal('quantity');
            $table->string('image');
            $table->timestamps();
             */
        return [
            'product_name' => $this->faker->sentence(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numerify('##'),
            'quantity' => $this->faker->numerify('##'),
            'image' => $this->faker->imageUrl(640,480), 
        ];
    }

}
