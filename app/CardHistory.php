<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CardHistory extends Model
{    
    protected $table = 'card_histories';
    protected $dateFormat = 'Y-m-d H:i:s';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'orderId', 'baokim_txn_id', 'card_type', 'card_code', 'card_serial', 'card_amount', 'card_real_amount', 
        'card_fee_amount', 'status', 'ingame_amount', 'baokim_txn_success', 'game_txn_sucsess'
    ];
}
