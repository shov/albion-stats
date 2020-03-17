<?php declare(strict_types=1);

namespace App\Domain\Market\Entities;

use App\Domain\Market\Models\Price;
use App\Infrastructure\Contracts\AbstractDTO;
use Carbon\Carbon;

/**
 * DTO for @see Price
 */
class PriceDTO extends AbstractDTO
{
    public int $id;
    public int $itemId;
    public int $qualityId;
    public int $storeId;
    public int $priceVariationId;
    public Carbon $registeredAt;
    public ?int $price;
    public array $details;
}
