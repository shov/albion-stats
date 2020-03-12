<?php

namespace App\Domain\Market\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Enchantment
 *
 * @property string $name
 */
class Enchantment extends Model
{
    protected $table = 'enchantments';
    protected $fillable = ['name'];

    const KNOWN_ENCHANTMENTS = [
        'none', '1', '2', '3',
    ];
}
