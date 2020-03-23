<?php declare(strict_types=1);

namespace App\Domain\Market\Repositories;

use App\Domain\Market\Entities\ItemDTO;
use App\Domain\Market\Models\Enchantment;
use App\Domain\Market\Models\Item;
use App\Domain\Market\Models\Tier;
use App\Jobs\SaveAr;
use Exception;
use Illuminate\Support\Facades\App;

/**
 * Repo for @see Item
 */
class ItemRepository
{
    protected Item $itemAr;
    protected ItemDTO $itemDTOStub;

    /**
     * DI
     * @param Item $itemAr
     * @param ItemDTO $itemDTOStub
     */
    public function __construct(Item $itemAr, ItemDTO $itemDTOStub)
    {
        $this->itemAr = $itemAr;
        $this->itemDTOStub = $itemDTOStub;
    }

    /**
     * Create new Item
     * @param string $name
     * @param array $details
     * @param Tier $tier
     * @param Enchantment $enchantment
     */
    public function create(string $name, array $details, ?Tier $tier, ?Enchantment $enchantment): void
    {
        $item = $this->preCreate(...func_get_args());

        $item->save();
    }

    /**
     * Create new Item
     * @param string $name
     * @param array $details
     * @param Tier $tier
     * @param Enchantment $enchantment
     */
    public function createParallel(string $name, array $details, ?Tier $tier, ?Enchantment $enchantment): void
    {
        $ar = $this->preCreate(...func_get_args());
        //$job = App::makeWith(SaveAr::class, compact('ar'));
        //$job->
        SaveAr::dispatch($ar);
    }

    /**
     * Create from definition
     * @param string $definition
     * @param bool $parallel
     * @throws Exception
     */
    public function createFromDefinition(string $definition, bool $parallel = true): void
    {
        //A reference
        // 525: T5_MEAL_OMELETTE_AVALON@1                                        : Avalonian Goose Omelette

        $spittedDefinition = explode(':', $definition);

        $nameParts = array_map(function ($part) {
            return trim($part);
        }, $spittedDefinition);

        $sourceId = null;
        $niceName = null;

        if (count($nameParts) === 1) {
            $expression = $nameParts[0];

        } else {
            $sourceId = $nameParts[0];
            $expression = $nameParts[1];
            $niceName = $nameParts[2] ?? null;
        }

        $parseExpression = [];
        preg_match_all(
            '/^(T(?<tier>[12345678]{1})_)?(?<itemName>[A-Z_0-9]+)(\@(?<enchantment>[123]{1}))?$/',
            $expression,
            $parseExpression
        );


        if (empty($parseExpression['itemName'][0] ?? null)) {
            throw new Exception("A definition ${definition} contents no item name!");
        }

        /** @var TierRepository $tierRepo */
        $tierRepo = App::make(TierRepository::class);

        $tier = null;
        if(!empty($parseExpression['tier'][0] ?? null)) {
            $tier = $tierRepo->getByName($parseExpression['tier'][0]);
        }

        /** @var EnchantmentRepository $enchantmentRepo */
        $enchantmentRepo = App::make(EnchantmentRepository::class);

        $enchantment = null;
        if(!empty($parseExpression['enchantment'][0] ?? null)) {
            $enchantment = $enchantmentRepo->getByName($parseExpression['enchantment'][0]);
        }

        $saving = 'create';

        if($parallel){
            $saving = 'createParallel';
        }

        $this->{$saving}($expression, compact('niceName', 'sourceId'), $tier, $enchantment);
    }

    /**
     * Prepare new Item to be  created
     * @param string $name
     * @param array $details
     * @param Tier $tier
     * @param Enchantment $enchantment
     * @return Item
     */
    protected function preCreate(string $name, array $details, ?Tier $tier, ?Enchantment $enchantment): Item
    {
        $item = $this->itemAr
            ->newInstance();

        $item->name = $name;
        $item->details = json_encode($details);

        if (!is_null($tier)) {
            $item->tier()->associate($tier);
        }

        if (!is_null($enchantment)) {
            $item->enchantment()->associate($enchantment);
        }

        return $item;
    }
}
