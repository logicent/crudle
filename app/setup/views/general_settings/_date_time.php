<div class="ui two column grid">
    <div class="column">
        <?= $form->field($model, 'defaultLanguage')->dropDownList([], ['disabled' => true]) ?>
    </div>
</div>

<div class="ui two column grid">
    <div class="column">
        <?= $form->field($model, 'firstDayOfTheWeek')->dropDownList(['sun' => 'Sun', 'mon' => 'Mon'], ['disabled' => true]) ?>
        <?= $form->field($model, 'defaultTimeZone')->dropDownList([], ['disabled' => true]) ?>
    </div>
    <div class="column">
        <?= $form->field($model, 'defaultDateFormat')->textInput(['readonly' => true, 'class' => 'datePicker']) ?>
        <?= $form->field($model, 'defaultTimeFormat')->textInput(['readonly' => true, 'class' => 'timePicker']) ?>
    </div>
</div>