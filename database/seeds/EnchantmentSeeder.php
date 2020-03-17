<?php

use App\Domain\Market\Models\Enchantment;
use App\Domain\Market\Repositories\EnchantmentRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class EnchantmentSeeder extends Seeder
{
    /** @var EnchantmentRepository */
    protected EnchantmentRepository $enchantmentRepo;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->enchantmentRepo = App::make(EnchantmentRepository::class);

        foreach (Enchantment::KNOWN_ENCHANTMENTS as $name) {
            $this->enchantmentRepo->create($name);
        }
    }
}
