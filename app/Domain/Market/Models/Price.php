<?php

namespace App\Domain\Market\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Price
 *
 * @property string $registered_at
 * @property null|integer $value
 * @property array $details
 */
class Price extends Model
{
    protected $table = 'prices';

    protected $dates = [
        'registered_at',
    ];

    public function item() {
        return $this->belongsTo(Item::class);
    }

    //TODO: investigate what is going on with qualities
    public function quality() {
        return $this->belongsTo(Quality::class);
    }

    public function store() {
        return $this->belongsTo(Store::class);
    }

    public function priceVariation() {
        return $this->belongsTo(PriceVariation::class);
    }
}
