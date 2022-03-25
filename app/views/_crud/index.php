
<?= $this->render('_breadcrumb') ?>

<div class="<?= $this->context->id ?>-<?= $this->context->action->id ?>">
    <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
</div>
