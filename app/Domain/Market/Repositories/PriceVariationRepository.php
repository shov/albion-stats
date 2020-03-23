<?php declare(strict_types=1);

namespace App\Domain\Market\Repositories;

use App\Domain\Market\Entities\PriceVariationDTO;
use App\Domain\Market\Models\PriceVariation;

/**
 * Repo for @see PriceVariation
 */
class PriceVariationRepository
{
    protected PriceVariation $priceVariationAr;
    protected PriceVariationDTO $priceVariationDTOStub;

    /**
     * DI
     * @param PriceVariation $priceVariationAr
     * @param PriceVariationDTO $priceVariationDTOStub
     */
    public function __construct(PriceVariation $priceVariationAr, PriceVariationDTO $priceVariationDTOStub)
    {
        $this->priceVariationAr = $priceVariationAr;
        $this->priceVariationDTOStub = $priceVariationDTOStub;
    }

    /**
     * Get by name
     * @param string $name
     * @return PriceVariation|null
     */
    public function getByName(string $name): ?PriceVariation
    {
        /** @var PriceVariation $result */
        $result = $this->priceVariationAr
            ->newQuery()
            ->where('name', $name)
            ->first();

        if(is_null($result)) {
            return null;
        }

        return $result;
    }

    /**
     * Create a priceVariation
     * @param string $name
     */
    public function create(string $name): void
    {
        $priceVariation = $this->priceVariationAr
            ->newInstance();

        $priceVariation->name = $name;
        $priceVariation->save();
    }
}
