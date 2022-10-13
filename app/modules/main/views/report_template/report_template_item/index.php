<?php

use crudle\app\main\models\ReportBuilderItem;
use crudle\app\main\models\ReportTemplateItem;

?>
<?= $this->render('@appMain/views/_form/_section', [
        'title'         => Yii::t('app', 'Section Attributes'),
        'content'       => $this->render('@appMain/views/_form_section/item', [
                                'modelClass' => ReportTemplateItem::class,
                            ]),
        'collapsible'   => false,
        'expanded'      => true,
    ]) ?>