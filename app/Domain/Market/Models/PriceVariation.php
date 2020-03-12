<?php

namespace App\Domain\Market\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PriceVariation
 *
 * @property string name
 */
class PriceVariation extends Model
{
    protected $table = 'price_variations';
    protected $fillable = ['name'];

    const KNOWN_VARIATIONS = [
        'SELL_MIN',
        'SELL_MAX',
        'BUY_MIN',
        'BUY_MAX',
    ];
}
