<?php

use yii\helpers\Html;

?>

<?= $this->render('@app_main/views/_modal/modal', [
        'modalId' => 'create__modal',
        'modalTitle' => 'New ' . $this->title,
        'positiveLabel' => 'OK',
        'negativeLabel' => 'Cancel',
        // 'closeButton' => '',
        'header' => '',
        'headerOptions' => [],
        'content' => Html::radioList('source', null, []),
        'contentOptions' => [],
        'actions' => '',
        'actionsOptions' => [],
        // 'type' => '',
        // 'fullscreen' => '',
        // 'size' => '',
    ]);

// event trigger
// btn_click
// event rule
// if ($(this).data('load-modal') == true)
// event AJAX callback
// url, data, onSuccess