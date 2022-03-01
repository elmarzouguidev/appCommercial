<?php

namespace Database\Factories;

use App\Constants\Etat;
use App\Constants\Status;
use App\Models\Client;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article' => $this->faker->sentence,
            'article_reference' => $this->faker->unique()->regexify('[0-9]{10}'),
            'description' => $this->faker->paragraphs(15, true),
            'active' => $this->faker->boolean(),
            'published' => $this->faker->boolean(),
            'etat' => Etat::NON_DIAGNOSTIQUER,
            'status' => Status::NON_TRAITE,
            'client_id' => Client::factory(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Ticket $item) {
            $url = 'https://source.unsplash.com/random/900x900';
            $item
                ->addMediaFromUrl($url)
                ->toMediaCollection('tickets-images');
        });
    }
}
