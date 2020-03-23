<?php declare(strict_types=1);

namespace App\Domain\Market\Repositories;

use App\Domain\Market\Entities\PriceDTO;
use App\Domain\Market\Models\Item;
use App\Domain\Market\Models\Price;
use App\Domain\Market\Models\PriceVariation;
use App\Domain\Market\Models\Quality;
use App\Domain\Market\Models\Store;
use Carbon\Carbon;

/**
 * Repo for @see Price
 */
class PriceRepository
{
    protected Price $priceAr;
    protected PriceDTO $priceDTO;

    /**
     * DI
     * @param Price $priceAr
     * @param PriceDTO $priceDTO
     */
    public function __construct(Price $priceAr, PriceDTO $priceDTO)
    {
        $this->priceAr = $priceAr;
        $this->priceDTO = $priceDTO;
    }

    /**
     * Create price record
     * @param int|null $value
     * @param array $details
     * @param Item $item
     * @param Quality $quality
     * @param Store $store
     * @param PriceVariation $priceVariation
     * @param Carbon $registeredAt
     */
    public function create(
        ?int $value,
        array $details,
        Item $item,
        Quality $quality,
        Store $store,
        PriceVariation $priceVariation,
        Carbon $registeredAt): void
    {
        $price = $this->priceAr
            ->newInstance();

        $price->value = $value;
        $price->details = json_encode($details);

        $price->registered_at = $registeredAt;

        $price->item()->associate($item);
        $price->quality()->associate($quality);
        $price->store()->associate($store);
        $price->priceVariation()->associate($priceVariation);

        $price->save();
    }
}
