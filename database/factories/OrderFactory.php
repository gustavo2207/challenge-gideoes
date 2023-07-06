<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productId = Product::pluck("id")->random();

        $product = Product::find($productId);

        $quantity = fake()->randomNumber();

        return [
            "order_number" => fake()->numerify("##########"),
            "order_date" => fake()->date(),
            "order_value" => $quantity * $product->price,
            "quantity" => $quantity,
            "status" => fake()->numberBetween(0, 2),
            "client_id" => Client::pluck("id")->random(),
            "product_id" => $productId,
        ];
    }
}
