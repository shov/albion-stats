<?php

use App\Domain\Market\Models\Store;
use App\Domain\Market\Repositories\StoreRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class StoreSeeder extends Seeder
{
    /** @var StoreRepository */
    protected StoreRepository $storeRepo;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->storeRepo = App::make(StoreRepository::class);

        $places = json_decode(Store::KNOWN_PLACES_JSON);

        foreach ($places as $place) {
            $this->storeRepo->create($place->Index, $place->UniqueName);
        }
    }
}
