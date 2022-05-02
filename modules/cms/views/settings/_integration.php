<div class="ui two column grid">
    <div class="column">
        <?= $form->field($model, 'enableGoogleIndexing')->checkbox() ?>
    </div>
    <div class="column">
        <?= $form->field($model, 'googleAnalyticsId')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'googleAnalyticsAnonymizeIP')->checkbox() ?>
    </div>
</div>