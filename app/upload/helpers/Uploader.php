<?php

namespace crudle\app\helpers;

use yii\web\UploadedFile;

class Uploader
{
    public static function getFile(&$model)
    {
        $fileObj = UploadedFile::getInstance($model->uploadForm, 'file_upload');

        if ($fileObj)
        {
            $model->uploadForm->file_upload = $fileObj;
            // if saveAs succeeded file_path is returned else false
            return $model->uploadForm->upload();
        }
        //     $model->uploadForm->file_upload = UploadedFile::getInstance(
        //         $model->uploadForm,
        //         "file_upload"
        //     );
        //     if (!is_null($model->uploadForm->file_upload))
        //         return $model->uploadForm->upload(); // filePath
        //     return false;
    }

    public static function getFiles(&$model, $index = null)
    {
        $attribute = 'file_uploads';
        if (!empty($index))
            $attribute = "[$index]file_uploads";

        $fileObjects = UploadedFile::getInstances($model->uploadForm, $attribute);
        if ($fileObjects)
        {
            $model->uploadForm->file_uploads = $fileObjects;
            // if saveAs succeeded file_path is returned else false
            return $model->uploadForm->uploads(); // filePaths or fileNames
        }
        return false;
    }
}