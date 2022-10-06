<?php

use yii\helpers\Html;
use yii\helpers\Url;
use icms\FomanticUI\Elements;

// Use static entry form since multiple modal forms are not working reliably
$isReadonly = $this->context->isReadonly();
?>

<div class="ui secondary segment sub header center aligned text-muted">
    <?= Yii::t('app', 'Sections') ?>
</div>
<div class="ui padded segment">
    <table id="template_section" class="ui celled table">
        <thead>
            <tr>
                <th><?= Html::a(Yii::t('app', 'Section name'), false) ?></th>
                <th width="16%"><?= Html::a(Yii::t('app', 'Section code'), false) ?></th>
                <th><?= Html::a(Yii::t('app', 'Level'), false) ?></th>
                <th><?= Html::a(Yii::t('app', 'Limit'), false) ?></th>
                <th width="6%"></th>
            </tr>
        </thead>
        <tbody>
<?php
    if ( !$model->isNewRecord && !empty($model->templateSection) ) :
        foreach ( $model->templateSection as $i => $element ) :
            echo $this->render( '_form', ['row_id' => $i, 'model'=> $element] );
        endforeach;
    else : ?>
            <tr id="no_data">
                <td colspan="4" class="center aligned">
                    <div class="ui tiny header text-muted">
                        <?= Yii::t('app', 'No template section.') ?>
                    </div>
                </td>
            </tr>
<?php 
    endif ?>        
        </tbody>
    </table>
<?php
if ( !$isReadonly ) :
    echo Elements::button( 
            Yii::t('app', 'Add Section'), 
            [
                'id'    => 'add_section', 
                'class' => 'compact ui mini button',
                'data'  => [
                    'url' => Url::to( ['report-template/add-section'] )
                ]
            ]);
endif ?>

</div>

<?php
$this->registerJs(<<<JS
    $('#add_section').on('click', function(e)
    {
        e.stopPropagation(); // !! DO NOT use return false; it stops execution
        rowCount = $('#template_section tbody > tr').length;

        $.ajax({
            url: $(this).data('url'),
            type: 'get',
            data: {
                'last_row_id': rowCount,
            },
            success: function( response )
            {
                $('#template_section #no_data').hide();
                $('#template_section tbody:last-child').append( response );
            },
            error: function( jqXhr, textStatus, errorThrown )
            {
                console.log( errorThrown );
            }
        });
    });

    $( '#template_section tbody' ).on('click', 'a.del-btn', function(e)
    {
        actionType_el = $(this).siblings('input');
        if (actionType_el.val() == 'Update')
        {
            actionType_el.val('Delete'); // mark for deletion
            $(this).closest('tr').hide();
        }
        else { // 'Create'
            $(this).closest('tr').remove();
        }

        rows = $('#template_section tbody > tr').not('#no_data');
        if (rows.length == 0)
            $('#template_section #no_data').show();
        else
            $('#template_section #no_data').hide();

    });
JS)
?>