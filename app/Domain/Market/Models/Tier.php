<?php

namespace App\Domain\Market\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tier
 *
 * @property string name
 */
class Tier extends Model
{
    protected $table = 'tiers';
    protected $fillable = ['name'];

    const KNOWN_TIERS = [
        '1', '2', '3', '4', '5', '6', '7', '8',
    ];
}
