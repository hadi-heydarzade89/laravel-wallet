<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $currencyIds = $userIds = [];
        foreach (User::all() as $user) {
            $userIds[] = $user->id;
        }
        foreach (Currency::all() as $currency) {
            $currencyIds[] = $currency->id;
        }

        return [
            'type' => $this->faker->randomElement(['withdrawal', 'deposit']),
            'user_id' => $this->faker->randomElement($userIds),
            'currency_id' => $this->faker->randomElement($currencyIds),
            'amount' => $this->faker->randomNumber(),
            'status' => $this->faker->randomElement(['confirm', 'reject']),
        ];

    }
}
