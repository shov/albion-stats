<?php declare(strict_types=1);

namespace App\Domain\Market\Entities;

use App\Domain\Market\Models\PriceVariation;
use App\Infrastructure\Contracts\AbstractDTO;

/**
 * DTO for @see PriceVariation
 */
class PriceVariationDTO extends AbstractDTO
{
    public int $id;
    public string $name;
}
