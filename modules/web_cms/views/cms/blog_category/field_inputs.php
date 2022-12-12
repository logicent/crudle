<div class="ui padded segment">
    <div class="ui two column grid">
        <div class="ui centered row">
            <?= $form->field($model, 'published')->checkbox(['class' => 'toggle']) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'id')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'slug')->textInput(['maxlength' => 140]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'route')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'layout')->dropDownList([]) ?>
        </div>
    </div>
    <div class="ui one column grid">
        <div class="column">
            <?= $this->render('@appMain/views/_form_field/rich_text_editor', [
                    'model' => $model,
                    'form' => $form,
                    'fieldValue' => $model->description,
                    'attribute' => 'description',
                ]) ?>
        </div>
    </div>
</div>
