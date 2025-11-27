<?php

namespace App\Models;

use App\Enums\PhotoEnum;
use App\Traits\DoctorTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Doctor extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia, DoctorTrait;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'status',
        'section_id',
    ];

    protected $translatable = [
        'name',
    ];

    protected $hidden = [
        'password',
    ];




    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(PhotoEnum::IMAGE)->singleFile();
    }
}
