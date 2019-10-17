<?php


namespace App\Traits;


trait OrderableTrait
{
    public function scopeLatestFirst($query, $type='created_at'){
        return $query->orderBy($type, 'desc');
    }
}
