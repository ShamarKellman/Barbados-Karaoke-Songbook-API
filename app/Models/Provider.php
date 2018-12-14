<?php

namespace App\Models;

use App\Song;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use CrudTrait;

    protected $fillable = ['name', 'short_code'];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
