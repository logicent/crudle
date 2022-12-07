<?php

use crudle\app\comment\forms\CommentForm;
use yii\helpers\Html;

$this->params['count_comments'] = $model->commentsCount;

if (!$model->isNewRecord) :
    $comment = new CommentForm();

    echo $this->render('comments/_form', ['model' => $model, 'comment' => $comment]);

    // List all system-generated and user created Comments
    Html::tag('div', is_array( $model->comments ) ? 
        $this->render('comments/timeline', ['comments' => $model->comments]) : null,
        [
            'class' => 'ui threaded comments',
            'id' => 'comment_timeline'
        ]);
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