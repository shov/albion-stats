<?php

namespace App\Domain\Market\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Quality
 *
 * @property string name
 */
class Quality extends Model
{
    protected $table = 'qualities';
    protected $fillable = ['name'];

    const KNOWN_QUALITIES = [
        '1', '2', '3', '4', '5',
    ];
}
