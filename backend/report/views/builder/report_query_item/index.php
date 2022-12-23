<?php

use crudle\app\report\models\ReportQueryItem;
?>
<?= $this->render('@appMain/views/_form/_section', [
    'title'         => Yii::t('app', 'Column Attributes'),
    'content'       => $this->render('@appMain/views/_form_table/item', [
        'modelClass' => ReportQueryItem::class
    ]),
    'collapsible'   => false,
    'expanded'      => true,
]);
