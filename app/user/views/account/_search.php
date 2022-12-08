<div class="ui four column grid">
    <div class="column">
        <?= $form
                ->field($searchModel, 'sex')
                ->textInput(['placeholder' => $searchModel->getAttributeLabel('sex')])
                ->label(false) ?>
    </div>
    <div class="column">
        <?= $form
                ->field($searchModel, 'mobile_no')
                ->textInput(['placeholder' => $searchModel->getAttributeLabel('mobile_no')])
                ->label(false) ?>
    </div>
    <div class="column">
        <?= $form
                ->field($searchModel, 'official_status')
                ->textInput(['placeholder' => $searchModel->getAttributeLabel('official_status')])
                ->label(false) ?>
    </div>
</div>