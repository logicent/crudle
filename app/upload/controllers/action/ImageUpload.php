<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;

class ImageUpload extends Action
{
    public function run()
    {
        // autorotate() Rotates an image automatically based on EXIF information.
        // crop()       Crops an image.
        // resize() 	Resizes an image.
        // text() 	    Draws a text string on an existing image.
        // watermark() 	Adds a watermark to an existing image.

        if (Yii::$app->request->isAjax)
        {
            // frame()  Adds a frame around of the image. Please note that the image size will increase by $margin x 2.
            // Image::frame(Yii::$app->request->post('img_path'), 5, '666', 0)
            //             ->rotate(-8)
            //             ->save('@webroot/images/' . Yii::$app->request->post('img_path'), ['jpeg_quality' => 50]);

            // thumbnail() 	Creates a thumbnail image.
            // Image::thumbnail('@webroot/images/' . Yii::$app->request->post('img_path'), 120, 120)
            //             ->save(Yii::getAlias('@webroot') . '_thumb', ['quality' => 50]);
        }
    }
}