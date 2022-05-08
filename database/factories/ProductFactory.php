<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        $product_name = $this->faker->unique()->words($nb=4, $asText=true);
        $slug = Str::slug($product_name);
        $short_desc = $this->faker->text(200);
        $description = $this->faker->text(500);
        $reg_price = $this->faker->numberBetween(10, 500);
        $sku = $this->faker->unique()->numberBetween(100, 500);
        $qty = $this->faker->numberBetween(100, 200);
        $image = $this->faker->unique()->numberBetween(1, 22).'.jpg';
        $categ = $this->faker->numberBetween(1, 5);
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_desc' => $short_desc,
            'description' => $description,
            'regular_price' => $reg_price,
            'SKU' => $sku,
            'stock_status' => 'instock',
            'quantity' => $qty,
            'image' => 'digital_' . $image,
            'category_id' => $categ
        ];
    }
}
