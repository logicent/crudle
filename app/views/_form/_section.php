<?php
// TODO: remove all bootstrap assets in project
// disable bootstrap assets from view(s) where called
use Zelenin\yii\SemanticUI\modules\Accordion;

?>
<!-- padded -->
<div class="ui <?= isset($isBottomSection) && $isBottomSection === true ? 'bottom' : '' ?> attached padded segment">

<?= Accordion::widget([
    // 'styled' => true,
    'fluid' => true,
    'titleOptions' => [
        'class' => 'ui tiny header text-muted',
        'style' => 'margin: 0'
    ],
    'contentOptions' => [
        'encode' => false,
        'class' => isset($expanded) && $expanded === true ? 'active' : ''
    ],
    'items' => [
        [
            'title' => $sectionTitle,
            'content' => $sectionContent // add form _partial here
        ],
    ]
]) ?>

</div>
