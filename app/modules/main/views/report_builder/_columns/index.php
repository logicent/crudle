<?php

use crudle\app\main\models\ReportBuilderItem;
?>
<?= $this->render('@appMain/views/_form/_section', [
        'title'         => Yii::t('app', 'Column Attributes'),
        'content'       => $this->render('@appMain/views/_form_section/item', [
                                'form' => $form,
                                'model' => new ReportBuilderItem(),
                                'detailModels' => $this->context->getDetailModels()['reportBuilderItems'],
                                'formView' => '@appMain/views/report_builder/_columns/field_inputs',
                                'listColumns' => '@appMain/views/report_builder/_columns/list_columns',
                                'listId' => 'report_columns',
                            ]),
        'collapsible'   => false,
        'expanded'      => true,
    ]) ?>