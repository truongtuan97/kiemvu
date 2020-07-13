<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    protected $table = 'card_types';
    protected $dateFormat = 'Y-m-d H:i:s';
    public $timestamps = false;

    protected $fillable = [
        'option', 'value'
    ];
}
