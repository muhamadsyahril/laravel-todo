<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    protected $table = 'todos';
    protected $fillable = array('title', 'completed');
}