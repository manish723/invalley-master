<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceBlock extends Model
{
    public function scopeIsActive($query)
    {
        return $query->where('f_active', true);
    }

    public function scopeUuid($query, $uuid)
    {
        return $query->where('uuid', $uuid);
    }
}
