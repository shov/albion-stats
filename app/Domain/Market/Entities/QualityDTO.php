<?php declare(strict_types=1);

namespace App\Domain\Market\Entities;

use App\Domain\Market\Models\Quality;
use App\Infrastructure\Contracts\AbstractDTO;

/**
 * DTO for @see Quality
 */
class QualityDTO extends AbstractDTO
{
    public int $id;
    public string $name;
}
