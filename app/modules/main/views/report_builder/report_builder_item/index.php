<?php

use crudle\app\main\models\ReportBuilderItem;
?>
<?= $this->render('@appMain/views/_form/_section', [
        'title'         => Yii::t('app', 'Column Attributes'),
        'content'       => $this->render('@appMain/views/_form_section/item', [
                                'modelClass' => ReportBuilderItem::class
                            ]),
        'collapsible'   => false,
        'expanded'      => true,
    ]) ?>