<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Withdrawal>
 */
class WithdrawalFactory extends Factory
{
    public function definition()
    {
        $user = \App\Models\User::inRandomOrder()->first() ?: User::factory()->create();

        return [
            'user_id' => $user->id,
            'nominal' => $this->faker->randomFloat(2, 10000, 500000),
            'metode' => $this->faker->randomElement(['tunai','transfer']),
            'status' => 'pending',
        ];
    }
}
