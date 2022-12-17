<?php

use yii\helpers\Html;
use yii\helpers\Inflector;
use icms\FomanticUI\helpers\Size;
use icms\FomanticUI\modules\Modal;

?>

<div class="compact ui floating dropdown button" style="padding-right: 8.75px;">
    <?= Yii::t('app', 'Menu') ?>&ensp;<i class="down small chevron icon"></i>
    <div class="menu">
<?php
    echo 
        Html::a(Yii::t('app', 'New') .'&nbsp;'. Inflector::titleize(Inflector::singularize($this->context->id)), ["create"], ['class' => 'item']) .
        Html::a(Yii::t('app', 'Print'), ['print'], ['class' => 'item']) .
        Html::a(Yii::t('app', 'Export'), ['export'], ['class' => 'item']) .

        Html::tag('div', '', ['class' => 'divider']) .

        Html::a(Yii::t('app', 'Save'), ['save'], [
            'class' => 'item',
            'data' => ['method' => 'post']
        ]) .
        Html::a(Yii::t('app', 'Save As'), ['save-as'], [
            'class' => 'item',
            'data' => ['method' => 'post']
        ]);
    echo
        Html::a(Yii::t('app', 'Import data'), ['import-data'], ['class' => 'item']) .
        Html::a(Yii::t('app', 'List view settings'), ['my-list-view-settings'],
                [
                    'class' => 'item',
                    'data' => [
                        'method' => 'post'
                    ]
                ]
            ) ?>
    </div><!-- ./menu -->
</div>

<?php
$modal = Modal::begin([
    'id' => 'subform_modal',
    'size' => Size::MEDIUM,
    ]);
$modal::end();

$this->registerJs(<<<JS

$('.user-action').on('click', function(e) 
{
    e.preventDefault();
    el_id = $(this).attr('id');

    $.ajax({
        url: $(this).data('url'),
        type: 'post',
        data: {
            'id': $(this).data('id'),
        },
        success: function( response )
        {
            if (el_id == 'print' || el_id == 'email')
            {
                $('#subform_modal .content').html( response );
                $('#subform_modal').modal({
                        centered: false,
                        closable: false,
                    })
                    .modal('show');
            }

            if (el_id == 'duplicate')
                $('#content').html( response );
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
            console.log( errorThrown );
        }
    });
});
JS);