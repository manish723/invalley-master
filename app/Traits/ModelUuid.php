<?php

namespace App\Traits;


trait ModelUuid
{
    public function scopeUuid($query, $uuid)
    {
        return $query->where('uuid', $uuid);
    }
}