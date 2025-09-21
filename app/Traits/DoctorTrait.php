<?php

namespace App\Traits;

use App\Helpers\MediaHelper;

trait DoctorTrait
{
    public function image()
    {
        return MediaHelper::mediaRelationship($this, 'image');
    }
}
