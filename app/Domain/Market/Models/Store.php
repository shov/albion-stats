<?php

namespace App\Domain\Market\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Store
 *
 * @property string name
 */
class Store extends Model
{
    protected $table = 'stores';
    protected $fillable = ['name'];

    const KNOWN_STORES = [
        'Black Market',
        'Caerleon',

        'Bridgewatch',
        'Fort Sterling',
        'Lymhurst',
        'Martlock',
        'Thetford',
    ];
}
