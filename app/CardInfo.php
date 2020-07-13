<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardInfo extends Model
{
    protected $table = 'card_infos';
    protected $dateFormat = 'Y-m-d H:i:s';
    public $timestamps = false;

    protected $fillable = [
        'option', 'value'
    ];
}
