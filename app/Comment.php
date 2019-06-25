<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guard = 'agent';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'user_id', 'agent_id'
    ];

    /**
     * Get the user associated with the comment
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the agent that created the comment
     */
    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }
}
