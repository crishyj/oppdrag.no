<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class City extends Model
{
    protected $guarded = [];
    use InsertOnDuplicateKey;    
}
