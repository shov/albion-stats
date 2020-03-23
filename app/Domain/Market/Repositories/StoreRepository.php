<?php declare(strict_types=1);

namespace App\Domain\Market\Repositories;

use App\Domain\Market\Entities\StoreDTO;
use App\Domain\Market\Models\Store;

/**
 * Repo for @see Store
 */
class StoreRepository
{
    protected Store $storeAr;
    protected StoreDTO $storeDTOStub;

    /**
     * DI
     * @param Store $storeAr
     * @param StoreDTO $storeDTOStub
     */
    public function __construct(Store $storeAr, StoreDTO $storeDTOStub)
    {
        $this->storeAr = $storeAr;
        $this->storeDTOStub = $storeDTOStub;
    }

    /**
     * Get by name
     * @param string $name
     * @return Store|null
     */
    public function getByName(string $name): ?Store
    {
        /** @var Store $result */
        $result = $this->storeAr
            ->newQuery()
            ->where('name', $name)
            ->first();

        if(is_null($result)) {
            return null;
        }

        return $result;
    }

    /**
     * Get the first of given nice name
     * @param string $niceName
     * @return Store|null
     */
    public function getByNiceName(string $niceName): ?Store
    {
        /** @var Store $result */
        $result = $this->storeAr
            ->newQuery()
            ->where('niceName', $niceName)
            ->first();

        if(is_null($result)) {
            return null;
        }

        return $result;
    }

    /**
     * Get by by name or nice name
     * @param string $expression
     * @return Store|null
     */
    public function getByNameExpression(string $expression): ?Store
    {
        /** @var ?Store $result */
        $result = $this->getByName($expression);

        if(is_null($result)) {
            $result= $this->getByNiceName($expression);
        }

        return $result;
    }

    /**
     * Create a store
     * @param string $name
     * @param string $niceName
     */
    public function create(string $name, string $niceName): void
    {
        $store = $this->storeAr
            ->newInstance();

        $store->name = $name;
        $store->niceName = $niceName;
        $store->save();
    }
}
