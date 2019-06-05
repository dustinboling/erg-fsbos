<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
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
