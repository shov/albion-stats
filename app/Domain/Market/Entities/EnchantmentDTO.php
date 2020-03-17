<?php declare(strict_types=1);

namespace App\Domain\Market\Entities;

use App\Infrastructure\Contracts\AbstractDTO;

class EnchantmentDTO extends AbstractDTO
{
    public int $id;
    public string $name;
}
