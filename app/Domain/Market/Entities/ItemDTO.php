<?php declare(strict_types=1);

namespace App\Domain\Market\Entities;

use App\Domain\Market\Models\Item;
use App\Infrastructure\Contracts\AbstractDTO;

/**
 * DTO for @see Item
 */
class ItemDTO extends AbstractDTO
{
    public int $id;
    public string $name;
    public int $tierId;
    public int $enchantmentId;
    public array $details;
}
