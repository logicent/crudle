<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;

$this->title = Yii::t('app', 'About');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'About'), 'url' => ['/about']];


$model = $this->context->getModel();
$detailModels = $this->context->getDetailModels();
?>

<div class="ui inverted vertical center aligned segment">
    <?= $this->render('@extCms/layouts/site/_navbar') ?>
</div>

<div class="ui vertical stripe segment">
    <div class="ui text container">
    <?= Elements::header($model->pageTitle, ['class' => 'huge centered', 'style' => 'font-weight: 500']) ?>
    <?= $model->ourIntro ?>

    <?= Elements::header($model->ourHistoryHeading, ['class' => 'centered', 'style' => 'font-weight: 500']) ?>
    <?= $model->ourHistory ?>

    <?php
    if (!$model->hideTeamSection) :
        echo Elements::header($model->ourTeamHeading, ['class' => 'centered', 'style' => 'font-weight: 500']);
        echo Elements::header($model->ourTeamSubheading, ['class' => 'small centered', 'style' => 'font-weight: 500']);
    ?>
        <div class="ui column grid">
    <?php
        foreach ($model->aboutTeamMember as $teamMember) :
            if ((bool) $teamMember['inactive']) :
                continue;
            endif;
            // echo $this->render('_team_member', ['teamMember' => $teamMember]);
            echo Html::beginTag('div', ['class' => 'center aligned four wide centered column']);
                echo Elements::image(Yii::getAlias('@web/uploads/') . $teamMember['photoImage'],
                                    ['class' => 'rounded']
                    );
                echo Elements::header($teamMember['fullName'], ['class' => 'tiny', 'style' => 'font-weight: 500']);
                echo Html::tag('p', $teamMember['designation']);

                if ((bool) $model->showTeamMemberBio) :
                    echo Html::tag('p', Html::encode($teamMember['bio']));
                endif;
            echo Html::endTag('div');
        endforeach ?>
        </div><!-- ./ui column grid -->
    <?php
    endif ?>
<!-- To-Do: Add footer section here -->
    </div>
</div>