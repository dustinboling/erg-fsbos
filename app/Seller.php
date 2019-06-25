<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email',
    ];

    public function listings()
    {
        return $this->hasMany('App\Listing', 'seller_id', 'id');
    }
}
