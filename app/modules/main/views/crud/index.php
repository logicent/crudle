<?php

$context = $this->context;
$model = $context->model;

$this->title = $model->isNewRecord ? Yii::t('app', '{formTitle}', ['formTitle' => 'New ' . $context->viewName()]) : $model->id;
?>

<?= $this->render('_breadcrumb') ?>

<div class="<?= $this->context->id ?>-<?= $this->context->action->id ?>">
    <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
</div>
