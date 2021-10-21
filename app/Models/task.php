<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    function getUserRelation()
    {
        return $this->hasOne("App\Models\User", "id", "user_id");
    }
}
