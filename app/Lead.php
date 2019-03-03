<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','phone','message','listing_id'];

    /**
     * Get the listing that owns this lead.
     */
    public function listing()
    {
        return $this->belongsTo('App\Listing');
    }
}
