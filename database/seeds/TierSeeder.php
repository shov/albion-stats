<?php

use App\Domain\Market\Models\Tier;
use App\Domain\Market\Repositories\TierRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class TierSeeder extends Seeder
{
    /** @var TierRepository */
    protected TierRepository $tierRepo;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->tierRepo = App::make(TierRepository::class);

        foreach (Tier::KNOWN_TIERS as $name) {
            $this->tierRepo->create($name);
        }
    }
}
