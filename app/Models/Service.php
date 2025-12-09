<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;

    protected $fillable = ['name', 'description', 'price', 'status'];

    public $translatable = ['name', 'description'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'service_group', 'service_id', 'group_id');
    }
}
