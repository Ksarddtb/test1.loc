<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

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
    protected $model = Product::class;

    public function definition()
    {
        return [
            'article'=> $this->faker->numerify('mypt-####'),
            'name'=>$this->faker->bothify('???-####/???-?###-??-#'),
            'status'=>rand(0,1)==1 ? 'available' : 'unavailable',
            'data'=>array(
                'color'=>$this->faker->colorName(),
                'make'=>$this->faker->country(),
                'size'=>rand(20,60),
            )
        ];
    }
}
