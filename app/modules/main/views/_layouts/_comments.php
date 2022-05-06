<?php

// <div class="ui threaded comments"> in _form/_footer
// sort comments by timestamps of most recent first

use crudle\app\main\enums\Type_Comment;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

ArrayHelper::multisort( $comments, 'createdAt', SORT_DESC );

foreach ( $comments as $id => $comment ) : ?>
    <div class="comment">
        <!-- <a class="ui circular image avatar"> -->
            <!-- <img src="<?php // Yii::getAlias('@web') ?>/img/male.svg"> -->
        <!-- </a> -->
        <!-- TODO: Fix .content class causes conflict with dropdowns when loaded in modals -->
        <div class="content">
            <div class="text">
        <?php
            $showCommenter = true;
            switch ($comment['type']) :
                case Type_Comment::ErrorMessage:
                    $showCommenter = false;
                    echo Elements::icon('large ban');
                    break;
                case Type_Comment::UserNote:
                    echo Elements::icon('large write'); // circular, bordered, @colored
                    break;
                default : // Type_Comment::ChangeLog:
                    echo Elements::icon('large history', ['class' => 'timeline-dot']);
            endswitch;

            if ($showCommenter) :
                echo Html::a($comment['commenter'], null, ['class' => 'author']);
            endif
            ?>
                <?= $comment['notes'] ?>&nbsp;&ndash;
                <span class="date"><?= Yii::$app->formatter->asRelativeTime( $comment['createdAt'] ) ?></span>
            </div>
        </div>
    </div>
    <!-- <div class="ui hidden divider"></div> -->
<?php endforeach ?>
