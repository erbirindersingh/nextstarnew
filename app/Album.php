<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'albumname','artistid','isdeleted',
    ];

}
