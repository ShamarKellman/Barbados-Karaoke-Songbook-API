<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use CrudTrait;

    protected $fillable = ['title', 'provider_id', 'code', 'is_popular'];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
