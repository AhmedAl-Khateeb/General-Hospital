<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class MediaHelper
{
    public static function mediaRelationship(Model $model, string $collectionName = 'default', array $additionalSelectedColumns = [])
    {
        return $model
            ->media()
            ->where('collection_name', $collectionName)
            ->select(
                array_merge(
                    ['id', 'model_id', 'disk', 'file_name', 'mime_type'],
                    $additionalSelectedColumns
                )
            );
    }

    public static function uploadMedia($model, $file, $collection)
    {
        if (!$file) {
            return;
        }

        if (is_array($file)) {
            foreach ($file as $singleFile) {
                $media = $model->addMedia($singleFile)
                    ->toMediaCollection($collection, 'media');

                $filePath = $media->getPath();
                if (file_exists($filePath)) {
                    @chmod($filePath, 0644);
                }
            }
        } else {
            $media = $model->addMedia($file)
                ->toMediaCollection($collection, 'media');

            $filePath = $media->getPath();
            if (file_exists($filePath)) {
                @chmod($filePath, 0644);
            }
        }
    }
}
