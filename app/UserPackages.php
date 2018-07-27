<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPackages extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'packageId','userId'
    ];
}
