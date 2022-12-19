<?php

use crudle\app\reporting\models\ReportBuilderItem;
use crudle\app\reporting\models\ReportTemplateItem;

?>
<?= $this->render('@appMain/views/_form/_section', [
        'title'         => Yii::t('app', 'Section Attributes'),
        'content'       => $this->render('@appMain/views/_form_table/item', [
                                'modelClass' => ReportTemplateItem::class,
                            ]),
        'collapsible'   => false,
        'expanded'      => true,
    ]) ?>