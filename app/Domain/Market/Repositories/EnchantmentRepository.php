<?php declare(strict_types=1);

namespace App\Domain\Market\Repositories;

use App\Domain\Market\Entities\EnchantmentDTO;
use App\Domain\Market\Models\Enchantment;

/**
 * Repo for @see Enchantment
 */
class EnchantmentRepository
{
    protected Enchantment $enchantmentAr;
    protected EnchantmentDTO $enchantmentDTOStub;

    /**
     * DI
     * @param Enchantment $enchantmentAr
     * @param EnchantmentDTO $enchantmentDTOStub
     */
    public function __construct(Enchantment $enchantmentAr, EnchantmentDTO $enchantmentDTOStub)
    {
        $this->enchantmentAr = $enchantmentAr;
        $this->enchantmentDTOStub = $enchantmentDTOStub;
    }

    /**
     * Get by name
     * @param string $name
     * @return Enchantment|null
     */
    public function getByName(string $name): ?Enchantment
    {
        /** @var Enchantment $result */
        $result = $this->enchantmentAr
            ->newQuery()
            ->where('name', $name)
            ->first();

        if (is_null($result)) {
            return null;
        }

        return $result;
    }

    /**
     * @param string $name
     */
    public function create(string $name): void
    {
        $enchantment = $this->enchantmentAr
            ->newInstance();

        $enchantment->name = $name;
        $enchantment->save();
    }
}
