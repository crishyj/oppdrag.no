<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class Country extends Model
{
    protected $guarded = [];
    use InsertOnDuplicateKey;    
    const USA = 231;
    const NOR = 164;
}
