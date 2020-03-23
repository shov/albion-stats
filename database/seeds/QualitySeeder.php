<?php

use App\Domain\Market\Models\Quality;
use App\Domain\Market\Repositories\QualityRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class QualitySeeder extends Seeder
{
    /** @var QualityRepository */
    protected QualityRepository $qualityRepo;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->qualityRepo = App::make(QualityRepository::class);

        foreach (Quality::KNOWN_QUALITIES as $name) {
            $this->qualityRepo->create($name);
        }
    }
}
