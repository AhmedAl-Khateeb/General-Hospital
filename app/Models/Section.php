<?php

namespace App\Models;

use App\Traits\PaginationTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use PaginationTrait, HasTranslations;

    protected $fillable = ['name', 'description'];

    public $translatable = ['name', 'description'];


    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
