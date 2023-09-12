<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TblPartyDtlsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            [
                'varPartyName' => fake()->name(),
                'varMobileNo' => Str::random(10),
                'varBillingAddress' => null,
                'bitShippingAdrSame' => 1,
                'varShippingAddress' => null,
                'intSupplyPlaceStateMstrsId' => 10,
                'varGstin' => 1,
                'bitDeletedFlag' => 0,
                'intCreatedby' => 1,
                'intUpdatedby' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
    }
}
