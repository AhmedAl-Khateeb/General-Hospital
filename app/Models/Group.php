<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Group extends Model
{
    use HasTranslations, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'total_before_discount',
        'discount_value',
        'total_after_discount',
        'text_rate',
        'total_with_tax',
        'is_active',
    ];

    public $translatable = ['name', 'description'];


    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_group', 'group_id', 'service_id');
    }
}
