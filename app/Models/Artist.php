<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use CrudTrait;

    protected $fillable = ['name'];

    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
}
