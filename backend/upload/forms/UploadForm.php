<?php

namespace crudle\app\upload\forms;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;


class UploadForm extends Model
{
    /**
     * @var UploadedFile
     * @var UploadedFile[]
     */
    public $file_upload;
    public $file_uploads;

    public $model_classname;
    public $model_attribute;
    public $model_path;

    public function rules()
    {
        return [
            [['file_upload'], 'file', 'extensions' => [
                'jpg', 'png', 'gif', 'jpeg', 'svg', 'webp',  // images
                'pdf', 'doc', 'xls', 'ppt', 'docx', 'xlsx', 'pptx',  // office documents
                'csv', 'txt',   // plain text
                'wav', 'mp3',   // audio
                'avi', 'mp4',   // video
                ], 'skipOnEmpty' => true // , 'maxSize' => 1024*1024
            ],
            [['file_uploads'], 'file', 'extensions' => [
                'jpg', 'png', 'gif', 'jpeg', 'svg', 'webp', // images
                'pdf', 'doc', 'xls', 'ppt', 'docx', 'xlsx', 'pptx',  // office documents
                'csv', 'txt',   // plain text
                'wav', 'mp3',   // audio
                'avi', 'mp4',   // video
                ], 'skipOnEmpty' => true, 'maxFiles' => 20 // , 'maxSize' => 1024*1024
            ],
        ];
    }

    public function upload($file_prefix = null)
    {
        if ($this->validate())
        {
            if ($file_prefix)
                $file_prefix .= '_';
            // TODO: maybe rename file and/or remove/replace spaces, commas etc.
            // $file_path = $this->file_upload->baseName . '.' . $this->file_upload->extension;
            $file_name = $file_prefix . $this->file_upload->name;
            $file_path = Yii::getAlias('@webroot/') . 'uploads/' . $file_name;
            if ( $this->file_upload->saveAs( $file_path ));
                return $file_name;
        }
        // else
        return false;
    }

    public function uploads($file_prefix = null)
    {
        if ($this->validate()) {
            $file_names = '';
            foreach ($this->file_uploads as $file) {
                if (!empty($file_names))
                    $file_names .= ',';
                if ($file_prefix)
                    $file_prefix .= '_';
                $file_name = $file_prefix . $file->baseName . '.' . $file->extension;
                // TODO: maybe rename file and/or remove/replace spaces, commas etc.
                $file_path = Yii::getAlias('@webroot/') . 'uploads/' . $file_name;
                if ( $file->saveAs($file_path))
                    $file_names .= $file_name;
            }
            return $file_names;
        }

        // else validation failed
        return false;
    }
}
