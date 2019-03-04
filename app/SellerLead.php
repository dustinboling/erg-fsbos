<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerLead extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name',
        'phone', 'email',
        'address_line_1', 'address_line_1', 'city', 'state', 'postal_code',
        'latitude', 'longitude',
        'message',
    ];
}
