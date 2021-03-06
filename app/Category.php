<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    // jika tidak mau memasukkan timestamp
    public $timestamps = true;

    protected $fillable = ['name', 'description'];
}
