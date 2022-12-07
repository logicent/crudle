<?php

// use app\assets\PikadayAsset;
// PikadayAsset::register($this);

use crudle\app\user\enums\Type_Role;

$this->title = Yii::t('app', 'Developer');
?>
    <div class="ui padded segment">
        <div class="two fields">
            <?= $form->field( $model, 'endUserLicense' )->textInput( ['maxlength' => true, 'readonly' => !Yii::$app->user->can(Type_Role::Administrator)] ) ?>
            <?= $form->field( $model, 'endUserReference', ['hintOptions' => ['tag' => 'small', 'class' => 'text-muted']] )->textInput( ['maxlength' => true, 'readonly' => !Yii::$app->user->can(Type_Role::Administrator)] ) ?>
        </div>
        <div class="two fields">
            <?= $form->field( $model, 'licenseValidFrom' )
                    ->textInput( [
                        'class' => 'pikaday', 'readonly' => !Yii::$app->user->can(Type_Role::Administrator)
                    ]) ?>
            <?= $form->field( $model, 'licenseValidTo' )
                    ->textInput( [
                        'class' => 'pikaday', 'readonly' => !Yii::$app->user->can(Type_Role::Administrator)
                    ]) ?>
        </div>
        <div class="two fields">
            <?= $form->field( $model, 'userLimit', ['hintOptions' => ['tag' => 'small', 'class' => 'text-muted']] )
                    ->textInput( ['readonly' => !Yii::$app->user->can(Type_Role::Administrator)] ) ?>
        </div>
    </div>
<?php
    if ( Yii::$app->user->can(Type_Role::Administrator) ) : ?>
        <div class="ui small header">
            <?= Yii::t('app', 'Integrations') ?>
        </div>
        <div class="ui padded segment">
            <?= $form->field( $model, 'enableSocialAuth', [
                        'hintOptions' => [
                            'tag' => 'div',
                            'class' => 'text-muted',
                            'style' => 'margin-top: 4px; margin-left: 26px; font-size: 80%;',
                        ]
                    ] )
                    ->checkbox([
                        'class' => !Yii::$app->user->can(Type_Role::Administrator) ? 'disabled' : ''
                    ]) ?>
        </div>
        <div class="ui small header">
            <?= Yii::t('app', 'Additional Modules') ?>
        </div>
        <div class="ui padded segment">
            <?= $form->field( $model, 'enableUserModules', [
                        'hintOptions' => [
                            'tag' => 'div',
                            'class' => 'text-muted',
                            'style' => 'margin-top: 4px; margin-left: 26px; font-size: 80%',
                        ]
                    ])
                    ->checkbox([
                        'class' => !Yii::$app->user->can(Type_Role::Administrator) ? 'disabled' : ''
                    ]) ?>
        </div>
<?php
    endif;

$this->registerJs(<<<JS
    // el_licenseValidFrom = $('#developerform-licensevalidfrom');
    // if (!el_licenseValidFrom.get(0).hasAttribute('readonly'))
    //     var licenseValidFrom = new Pikaday({ field: el_licenseValidFrom });

    // el_licenseValidTo = $('#developerform-licensevalidto');
    // if (!el_licenseValidTo[0].hasAttribute('readonly'))
    //     var licenseValidTo = new Pikaday({ field: el_licenseValidTo });
JS)
?>
