<?php declare(strict_types=1);

namespace App\Domain\Market\Entities;

use App\Domain\Market\Models\Tier;
use App\Infrastructure\Contracts\AbstractDTO;

/**
 * DTO for @see Tier
 */
class TierDTO extends AbstractDTO
{
    public int $id;
    public string $name;
}
