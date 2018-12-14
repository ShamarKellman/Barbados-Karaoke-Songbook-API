<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Genre extends Model
{
    use CrudTrait;

    protected $fillable = ['name'];

    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }

}
