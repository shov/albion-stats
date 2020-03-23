<?php

use App\Domain\Market\Models\PriceVariation;
use App\Domain\Market\Repositories\PriceVariationRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class PriceVariationSeeder extends Seeder
{
    /** @var PriceVariationRepository */
    protected PriceVariationRepository $priceVariationRepo;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->priceVariationRepo = App::make(PriceVariationRepository::class);

        foreach (PriceVariation::KNOWN_VARIATIONS as $name) {
            $this->priceVariationRepo->create($name);
        }
    }
}
