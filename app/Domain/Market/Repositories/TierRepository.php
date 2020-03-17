<?php declare(strict_types=1);

namespace App\Domain\Market\Repositories;

use App\Domain\Market\Entities\TierDTO;
use App\Domain\Market\Models\Tier;

/**
 * Repo for @see Tier
 */
class TierRepository
{
    protected Tier $tierAr;
    protected TierDTO $tierDTOStub;

    /**
     * DI
     * @param Tier $tierAr
     * @param TierDTO $tierDTOStub
     */
    public function __construct(Tier $tierAr, TierDTO $tierDTOStub)
    {
        $this->tierAr = $tierAr;
        $this->tierDTOStub = $tierDTOStub;
    }

    /**
     * Get by name
     * @param string $name
     * @return Tier|null
     */
    public function getByName(string $name): ?Tier
    {
        /** @var Tier $result */
        $result = $this->tierAr
            ->newQuery()
            ->where('name', $name)
            ->first();

        if(is_null($result)) {
            return null;
        }

        return $result;
    }

    /**
     * Create a tier
     * @param string $name
     */
    public function create(string $name): void
    {
        $tier = $this->tierAr
            ->newInstance();

        $tier->name = $name;
        $tier->save();
    }
}
