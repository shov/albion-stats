<?php declare(strict_types=1);

namespace App\Domain\Market\Repositories;

use App\Domain\Market\Entities\QualityDTO;
use App\Domain\Market\Models\Quality;

/**
 * Repo for @see Quality
 */
class QualityRepository
{
    protected Quality $qualityAr;
    protected QualityDTO $qualityDTOStub;

    /**
     * DI
     * @param Quality $qualityAr
     * @param QualityDTO $qualityDTOStub
     */
    public function __construct(Quality $qualityAr, QualityDTO $qualityDTOStub)
    {
        $this->qualityAr = $qualityAr;
        $this->qualityDTOStub = $qualityDTOStub;
    }

    /**
     * Get by name
     * @param string $name
     * @return Quality|null
     */
    public function getByName(string $name): ?Quality
    {
        /** @var Quality $result */
        $result = $this->qualityAr
            ->newQuery()
            ->where('name', $name)
            ->first();

        if(is_null($result)) {
            return null;
        }

        return $result;
    }

    /**
     * Create a quality
     * @param string $name
     */
    public function create(string $name): void
    {
        $quality = $this->qualityAr
            ->newInstance();

        $quality->name = $name;
        $quality->save();
    }
}
