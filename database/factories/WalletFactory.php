<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalletFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wallet::class;

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
            'user_id' => $this->faker->randomElement($userIds),
            'currency_id' => $this->faker->randomElement($currencyIds),
            'amount' => $this->faker->randomNumber(),
        ];

    }
}
