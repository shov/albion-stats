<?php declare(strict_types=1);

namespace App\Domain\Market\Entities;

use App\Domain\Market\Models\Store;
use App\Infrastructure\Contracts\AbstractDTO;

/**
 * DTO for @see Store
 */
class StoreDTO extends AbstractDTO
{
    public int $id;
    public string $name;
    public string $niceName;
}
