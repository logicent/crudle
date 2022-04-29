<?php

/* @var $this yii\web\View */
/* @var $diff mixed */

use yii\helpers\Html;

?>
<div class="default-diff">
<?php
    if ($diff === false) :
        echo Html::tag('div', Yii::t('app', 'Diff is not supported for this file type.'), [
                'class' => 'ui negative message'
            ]);
    elseif (empty($diff)) :
        echo Html::tag('div', Yii::t('app', 'Identical.'), [
                'class' => 'ui positive message'
            ]);
    else:
        echo Html::tag('div', $diff, ['class' => 'content']);
    endif ?>
</div>
