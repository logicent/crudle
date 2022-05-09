<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

$this->title = Yii::t('app', 'List View Settings');

$form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form ajax-submit',
        ],
    ]) ?>

    <?= $this->render('@appMain/views/_form/_modal_header', ['model' => $model]) ?>

    <div class="ui attached segment">
        <?= Html::activeHiddenInput($model, 'listModelClass') ?>
        <?= Html::activeHiddenInput($model, 'listNameAttribute') ?>
        <?= Html::activeHiddenInput($model, 'listIdAttribute') ?>
        <?= Html::activeHiddenInput($model, 'listStatusAttribute') ?>
        <?= Html::activeHiddenInput($model, 'defaultListViewColumns') ?>
        <?= Html::activeHiddenInput($model, 'showListActions') ?>
        <?= Html::activeHiddenInput($model, 'isEditable') ?>
        <?= Html::activeHiddenInput($model, 'defaultFilters') ?>
        <?= Html::activeHiddenInput($model, 'filterColumns') ?>
        <?= Html::activeHiddenInput($model, 'isSortable') ?>
        <?= Html::activeHiddenInput($model, 'defaultSortOrder') ?>
        <?= Html::activeHiddenInput($model, 'showCommentsCount') ?>
        <?= Html::activeHiddenInput($model, 'showLatestCommentsOnHover') ?>
        <?= Html::activeHiddenInput($model, 'showLastUpdate') ?>
        <?= Html::activeHiddenInput($model, 'showLastUpdateByOnHover') ?>
        <?= Html::activeHiddenInput($model, 'showPagination') ?>
        <?= Html::activeHiddenInput($model, 'defaultRowsPerPage') ?>
        <?= Html::activeHiddenInput($model, 'storeListViewState') ?>

        <?= $form->field( $model, 'userListViewColumns' )->checkboxList([]) ?>
        <?= $form->field( $model, 'userRowsPerPage')->textInput(['maxlength' => true]) ?>

        <?= $this->render( '_user_filters', ['model' => $model, 'form' => $form] ) ?>
        <?= $this->render( '_user_sort_order', ['model' => $model, 'form' => $form] ) ?>
    </div>
<?php 
ActiveForm::end();
$this->registerJs($this->render('@appMain/views/_form/_submit.js'));
?>