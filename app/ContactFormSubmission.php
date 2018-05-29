<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ContactFormSubmission extends Model
{
    protected $fillable = [
        "name",
        "email",
        "message"
    ];
}
