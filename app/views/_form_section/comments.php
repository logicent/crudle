<?php

use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;

use app\models\CommentForm;

$this->params['count_comments'] = $model->commentsCount;

if (!$model->isNewRecord) :
    $comment = new CommentForm(); ?>

    <div id="comment_section" class="ui divider hidden"></div>
<?php
    // if ($model->userCanComment( Yii::$app->user->id )) :
        echo Html::beginForm([$this->context->id . '/save-comment', 'id' => $model->{$model->primaryKey()[0]}], 
                'post', 
                ['class' => 'ui form comment-form']); ?>

    <div class="ui secondary attached padded segment">
        <div class="ui two column grid">
            <div class="column">
                <div class="ui small header">
                    <?= Yii::t('app', 'Add a comment') ?>
                </div>
            </div>
            <div class="right aligned column" style="padding-top: 0.5rem; padding-bottom: 0.5rem">
                <!-- Avoid button element it will cause page refresh -->
                <?= Elements::button(Yii::t('app', 'Comment'), [
                        'id' => 'submit_comment',
                        'class' => 'compact small',
                        'style' => 'margin-right: 0em',
                        'data' => [
                            'url' => Url::to([
                                'save-comment',
                                'model_id' => $model->id,
                            ])
                        ]
                    ]
                ) ?>
            </div>
        </div>
    </div>

    <div class="ui bottom attached padded segment">
        <?= Html::activeTextarea($comment, 'comment', [
                'class' => 'comment-box',
                'rows' => 2, 
                'style' => 'resize: none;'
            ]) ?>
    </div>
    <?= Html::endForm(); ?>
<?php
    // endif ?>

    <!-- List all system-generated and user created Comments -->
    <div class="ui threaded comments" id="comment_timeline">
<?php 
    if ( is_array( $model->comments )) :
        echo $this->render('//_layouts/_comments', ['comments' => $model->comments]);
    endif ?>
    </div>
<?php
endif;

$this->registerJs(<<<JS
    $('#submit_comment').on('click', function(e)
    {
        e.stopPropagation(); // !! DO NOT use return false; it stops execution
        
        commentText = $('.comment-box').val();
        if ( commentText == '')
            return false;
        
        $.ajax({
            url: $(this).data('url'),
            type: 'post',
            data: {'comment_text': commentText, _csrf: yii.getCsrfToken()},
            success: function( response )
            {
                // clear the comment box
                $('.comment-box').val('');
                // update comment timeline below the form
                $('#comment_timeline').html( response );
            },
            error: function( jqXhr, textStatus, errorThrown )
            {
                console.log( errorThrown );
            }
        });
    })
JS);
