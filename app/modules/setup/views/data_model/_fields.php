<?= $this->render('field/list_columns', [
        'dataProvider' => $this->context->fieldDataProvider,
        'model' => $model,
    ]) ?>