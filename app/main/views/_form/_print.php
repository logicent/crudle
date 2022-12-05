<?php

use icms\FomanticUI\widgets\ActiveForm;

$this->title = Yii::t('app', '{title}', ['title' => $model->formName() . ' Payment']);
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin([
    'options' => ['target' => '_blank']
]); ?>

<div class="ui basic center aligned segment">
    <div class="ui column grid">
        <div class="centered column">
            <div id="receipt-header">
                <p><img src="<?= Yii::getAlias('@webroot/') // . insert Business logo here ?>"></p>
                <p>
                    <b><!-- insert Business name here --></b><br>
                    <!-- insert Business address here -->
                </p>
                <p class="left aligned">
                <?= Yii::t('app', 'Customer:') ?>&ensp; <?= $model->customer_name ?><br>
                <?= Yii::t('app', 'Date:') ?>&ensp; <?= Yii::$app->formatter->asDateTime($model->paid_at) ?>
                </p>
            </div>

            <div class="ui divider hidden"></div>

            <table class="compact ui very basic table">
                <thead>
                    <tr>
                        <th><?= Yii::t('app', 'Item') ?></th>
                        <th class="right aligned"><?= Yii::t('app', 'Qty') ?></th>
                        <th class="right aligned"><?= Yii::t('app', 'Unit price') ?></th>
                        <th class="right aligned"><?= Yii::t('app', 'Total') ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($model->salesDoc->items as $item) : ?>
                    <tr>
                        <td><?= $item->itemName ?></td>
                        <td class="right aligned"><?= $item->qty ?></td>
                        <td class="right aligned"><?= number_format($item->unit_price) ?></td>
                        <td class="right aligned"><?= number_format($item->total_amount) ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <div class="ui divider hidden"></div>

            <div class="ui basic segment">
                <div class="ui two column grid">
                    <div class="column">
                    </div>
                    <div class="column">
                        <table class="compact ui very basic table">
                            <tbody class="right aligned">
                                <tr>
                                    <td><?= Yii::t('app', 'Amount Paid:') ?></td>
                                    <td><?= number_format($model->paid_amount, 2) ?></td>
                                </tr>
                                <tr>
                                    <td><?= Yii::t('app', 'Tax Amount:') ?> (<?= $model->tax_rate ?>%):</td>
                                    <td><?= number_format($model->tax_amount, 2) ?></td>
                                </tr>
                                <tr>
                                    <td><?= Yii::t('app', 'Total Due:') ?></td>
                                    <td><?= number_format($model->salesDoc->total_amount_due, 2) ?></td>
                                </tr>
                                <tr>
                                    <td><?= Yii::t('app', 'Unpaid Bal:') ?></td>
                                    <td><?= number_format($model->salesDoc->unpaid_balance, 2) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="ui basic segment">
                <p><?= Yii::t('app', 'Thank you please visit us again') ?></p>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
