<?php

namespace Database\Factories\Finance;

use App\Models\Finance\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{

    protected $model = Provider::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entreprise' => $this->faker->unique()->company,
            'contact' => $this->faker->name('male'),
            'addresse' => $this->faker->address,
            'telephone' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            'description' => $this->faker->words(5, true),
            'ice' => $this->faker->unique()->regexify('[0-9]{10}'),
            'rc' => $this->faker->unique()->regexify('[0-9]{5}'),
        ];
    }
}
