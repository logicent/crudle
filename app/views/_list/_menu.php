<?php

use yii\helpers\Html;
use yii\helpers\Inflector;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Modal;

?>

<div class="compact ui floating small dropdown button" style="padding-right: 8.75px;">
    <?= Yii::t('app', 'Menu') ?>&ensp;<i class="down small chevron icon"></i>
    <div class="menu">
<?php
    if ($this->context->action->id == 'report-builder') :
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
    endif;

    if ( $this->context->action->id == 'index' ) :
        echo
            Html::a(Yii::t('app', 'Import data'), ['setup/data-import'], ['class' => 'item']) .
            Html::a(Yii::t('app', 'User permissions'), ['setup/role/user-permissions'], ['class' => 'item']) .
            Html::a(Yii::t('app', 'Role permissions'), ['setup/role/role-permissions'], ['class' => 'item']) .
            // Html::a(Yii::t('app', 'Setup'), ['setup'], ['class' => 'item']) .
            Html::a(Yii::t('app', 'Toggle sidebar'), ['user-settings/toggle-sidebar'], ['class' => 'item']) .
            Html::a(Yii::t('app', 'List view settings'), ['user-settings/list-view-settings'], ['class' => 'item']);
    endif ?>
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
JS) ?>