<?php
// To-Do: remove all bootstrap assets in project
// disable bootstrap assets from view(s) where called
use icms\FomanticUI\modules\Accordion;


$active = isset($expanded) && $expanded === true ? 'active' : '';
$disabledClass = $this->context->isReadonly() ? 'disabled' : null;

if (isset($collapsible) && $collapsible === false) :
?>
    <div class="ui <?= $disabledClass ?> segments">
    <?php
        if ($title) : ?>
        <div class="ui padded segment" style="padding-bottom: 0.5em;">
            <div class="ui small header">
                <?= Yii::t('app', '{sectionTitle}', ['sectionTitle' => $title]) ?>
            </div>
        </div>
    <?php
        endif ?>
        <div class="ui padded segment">
            <?= $content ?>
        </div>
    </div>
<?php
else : ?>
    <div class="ui <?= $disabledClass ?> padded segment">
        <?= Accordion::widget([
                // 'fluid' => true,
                'titleOptions' => [
                    'class' => "ui small header {$active}",
                    'style' => 'margin: 0;'
                ],
                'contentOptions' => [
                    'encode' => false,
                    'class' => $active,
                    'style' => 'margin-top: 14px' // offset title margin
                ],
                'items' => [
                    [
                        'title' => Yii::t('app', '{sectionTitle}', ['sectionTitle' => $title]),
                        'content' => $content
                    ],
                ]
            ]) ?>
    </div>
<?php
endif;

$this->registerJs(<<<JS
// custom code here
JS);
