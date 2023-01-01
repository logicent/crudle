<div class="ui two column grid">
    <div class="twelve wide column">
        <?= $this->render('_main_column', ['model' => $model, 'form' => $form]) ?>
    </div>
    <div class="four wide column">
        <?= $this->render('_side_column', ['model' => $model, 'form' => $form]) ?>
    </div>
</div>