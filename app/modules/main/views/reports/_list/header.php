<?php

use yii\helpers\Html;
// use Zelenin\yii\SemanticUI\helpers\Size;
// use Zelenin\yii\SemanticUI\modules\Modal;

?>

<div class="ui top secondary attached right aligned segment">
    <div class="ui grid">
        <div class="thirteen wide column">
            <div class="ui floated header">
                <?= Html::encode($this->title) ?>
            </div>
        </div>
        <div class="three wide column right aligned">
        <?php
            // if ( Yii::$app->user->can('Export ' . $this->context->viewName() )) :
                echo Html::a(Yii::t('app', 'Export'), ['export'], [
                    'id' => 'export_btn',
                    'class' => 'compact ui primary button show-export-form',
                ]);
            // endif ?>
        </div>
    </div>
</div>