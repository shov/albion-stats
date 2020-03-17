<?php

use App\Domain\Market\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use \App\Domain\Market\Repositories\ItemRepository;

class ItemSeeder extends Seeder
{
    /** @var ItemRepository */
    protected ItemRepository $itemRepo;

    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $this->itemRepo = App::make(ItemRepository::class);
        $itemDefinitions = explode("\n", Item::KNOWN_ITEMS);
        foreach ($itemDefinitions as $definition) {
            $this->itemRepo->createFromDefinition($definition);
        }
    }
}
