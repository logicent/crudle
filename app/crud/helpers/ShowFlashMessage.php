<?php

namespace crudle\app\helpers;

use Yii;
use yii\helpers\ArrayHelper;

class ShowFlashMessage
{
    public function setFlashMessage($insert, $changedAttributes)
    {
        switch ($insert) {
            case false:
                $message = 'Update';
                break;
            case true:
                $message = 'Create';
                break;
            default:
                $message = '';
                break;
        }

        if (ArrayHelper::keyExists('status', $changedAttributes))
            $message = 'Status Change';

        $text = '<span class="app-status-label"><i class="ui mini green empty circular label"></i>&ensp;' . $message . ' Successful &ensp;</span>';
        Yii::$app->getSession()->setFlash('actionResponse', $text);

        // Do not set flash after login
        if (ArrayHelper::keyExists('logged_on', $changedAttributes))
            Yii::$app->getSession()->removeFlash('actionResponse');
    }

}