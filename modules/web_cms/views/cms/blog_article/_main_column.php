<?php

use bizley\quill\Quill;
use crudle\app\crud\helpers\SelectableItems;
use crudle\ext\web_cms\models\BlogArticle;
use crudle\ext\web_cms\models\BlogCategory;
use icms\FomanticUI\modules\Select;

?>
<div class="ui padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'title')->textInput(['maxlength' => 280]) ?>
            <?= $form->field($model, 'category_id')->widget(Select::class, [
                    'model' => $model,
                    'attribute' => 'category_id',
                    'items' => SelectableItems::get(BlogCategory::class, $model, [
                        'keyAttribute' => 'id',
                        'valueAttribute' => 'id'
                    ]),
                    'search' => true
                ]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'route')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'post_series_id')->widget(Select::class, [
                'items' => SelectableItems::get(BlogArticle::class, $model, [
                    'keyAttribute' => 'id',
                    'valueAttribute' => 'id',
                    'filters' => [
                        ['!=', 'id', $model->id]
                    ]
                ])
            ]) ?>
        </div>
    </div>
    <div class="ui one column grid">
        <div class="column">
            <?= $this->render('@appMain/views/_form_field/textarea', [
                    'form' => $form,
                    'model' => $model,
                    'attribute' => 'intro',
                    'rows' => 3
                ]) ?>
            <?= $this->render('@appMain/views/_form_field/rich_text_editor', [
                    'model' => $model,
                    'attribute' => 'content',
                    'form' => $form,
                    'fieldValue' => $model->content,
                    'toolbar' => Quill::TOOLBAR_FULL
                ]) ?>
        </div>
    </div>
</div>
