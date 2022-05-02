<?php
/* @var $this yii\web\View */
/* @var $generator crudle\kit\Generator */
/* @var $results string */
/* @var $hasError bool */

use yii\helpers\Html;

?>
<div class="default-view-results">
<?php
    if ($hasError) :
        $message = Yii::t('app', 'An error was encountered while attempting to create the code files.');
        echo Html::tag('div', $message, ['class' => 'ui negative message']);
    else :
        echo Html::tag('div', $generator->successMessage(), ['class' => 'ui positive message']);
    endif;
    echo Html::tag('pre', nl2br($results)) ?>
</div>
