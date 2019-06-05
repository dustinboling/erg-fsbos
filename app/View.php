<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['viewable_id', 'viewable_type'];

    /**
     * Get the user that owns the view.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get all of the owning viewable models.
     */
    public function viewable()
    {
        return $this->morphTo();
    }
}
