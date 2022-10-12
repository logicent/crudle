<?php

use yii\helpers\Html;

echo Html::beginForm($url, 'post', ['class' => 'ui form', 'id' => 'comment_form']) ?>

    <div class="ui attached secondary segment">
        <div class="ui two column grid">
            <div class="column">
                <div class="ui header" style="font-weight: 500"><?= Yii::t('app', 'To set Status as ' . $new_status) ?></div>
            </div>
            <div class="right aligned column">
                <?= Html::submitButton(Yii::t('app', 'Submit'), [
                        'id' => 'add_comment',
                        'class' => 'compact ui small primary button',
                        'data' => [
                            'url' => $url,
                            'new-status' => $new_status,
                            'require-comment' => $require_comment
                        ]
                    ]) ?>
            </div>
        </div>
    </div>

    <div class="ui bottom attached padded segment">
        <div class="field required">
            <?= Html::label(Yii::t('app', "Enter a comment of 20 or more characters"), 'comment') ?>
            <?= Html::textarea('comment', '', [
                    'autofocus' => true,
                    'id' => 'comment_box',
                    'rows' => 2, 
                    'style' => 'resize: none;'
                ]) ?>
        </div>
    </div>
<?php
echo Html::endForm();

$this->registerJs(<<<JS
$('#add_comment').on('click', function(e) 
{
    e.preventDefault();

    newStatus = $(this).data('new-status');
    
    commentText = $('#comment_box').val();
    if (commentText == '' || commentText.length < 20)
        return false;
    
    $.ajax({
        url: $(this).data('url'),
        type: 'post',
        data: {
            'new_status': $(this).data('new-status'),
            'require_comment': $(this).data('require-comment'),
            'comment_text': commentText
        },
        success: function( response )
        {
            if (response['failed'])
            {
                // TODO: also show flash message to user - how ?
                $('#status_label').html( currentStatus );
            }
            else {
                // TODO: also show flash message to user - how ?
                // update the status label with icon + status
                $('#status_label').html( response );
                // update the hidden status input to avoid overwrite in update
                $('#status_input').val( newStatus );
            }
            // unload the comment modal form
            $('#comment_modal').modal('hide');
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
            console.log( errorThrown );
        }
    });
    return false; // prevent default form submission
});
JS);