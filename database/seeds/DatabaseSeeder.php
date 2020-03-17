<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seed = env('SEED', null);
        if(true === $seed) {
            $this->call(TierSeeder::class);
            $this->call(QualitySeeder::class);
            $this->call(EnchantmentSeeder::class);
            $this->call(ItemSeeder::class);

            $this->call(PriceVariationSeeder::class);
            $this->call(StoreSeeder::class);
        }
    }
}
