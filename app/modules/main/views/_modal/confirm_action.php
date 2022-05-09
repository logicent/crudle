
<?= $this->render('@appMain/views/_modal/modal', [
        'modalId' => 'confirm_action__modal',
        'modalTitle' => 'Confirm ' . $action,
        'positiveLabel' => 'Yes',
        'negativeLabel' => 'No',
        // 'closeButton' => '',
        'header' => '',
        'headerOptions' => [],
        'content' => <<<HTML
            <p><?= Yii::t('app', "Are you sure you want to {$action}?") ?></p>
        HTML,
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

$this->registerJs(<<<JS
// load modal to submit request via ajax if response = yes
function confirmAction(url, data = null)
{
    $.ajax({
        url: url,
        type: 'post',
        data: data,
        success: function( response ) {
            location.reload(); // refresh current view
        },
        error: function( jqXhr, textStatus, errorThrown ) {
            console.log( errorThrown );
        }
    });
}
JS) ?>