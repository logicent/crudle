<?php

use yii\helpers\Html;
use yii\helpers\Url;
use icms\FomanticUI\Elements;

?>

<?= Html::beginForm(
    [$this->context->id . '/save-comment', 'id' => $model->{$model->primaryKey()[0]}],
    'post',
    ['class' => 'ui form comment-form']
) ?>

<div class="ui secondary attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <div class="ui small header">
                <?= Yii::t('app', 'Add a comment') ?>
            </div>
        </div>
        <div class="right aligned column" style="padding-top: 0.5rem; padding-bottom: 0.5rem">
            <!-- Avoid button element it will cause page refresh -->
            <?= Elements::button(
                Yii::t('app', 'Comment'), [
                    'id' => 'submit_comment',
                    'class' => 'compact small',
                    'style' => 'margin-right: 0em',
                    'data' => [
                        'url' => Url::to([
                            'save-comment',
                            'model_id' => $model->{$model->primaryKey()[0]},
                        ])
                    ]
                ]) ?>
        </div>
    </div>
</div>

<div class="ui attached padded segment">
    <?= Html::activeTextarea($comment, 'comment', [
        'class' => 'comment-box',
        'rows' => 2,
        'style' => 'resize: none;'
    ]) ?>
</div>
<?= Html::endForm();