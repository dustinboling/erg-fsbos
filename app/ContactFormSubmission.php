<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactFormSubmission extends Model
{
    public $fillable = ['name', 'phone', 'email', 'message'];
}
