<?php

namespace app\modules\website\models;

use app\modules\website\models\base\BasePersonInfo;
use Yii;
use yii\helpers\ArrayHelper;

class BlogWriter extends BasePersonInfo
{
    public static function tableName()
    {
        return 'site_post_author';
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'date_published' => Yii::t('app', 'Date published')
        ]);
    }
}
