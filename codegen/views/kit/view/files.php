<?php

use yii\helpers\Html;
use crudle\kit\CodeFile;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;

/* @var $this \yii\web\View */
/* @var $generator \crudle\kit\Generator */
/* @var $files CodeFile[] */
/* @var $selectedFiles array */
/* @var $id string panel ID */
?>

<div class="default-view-files">
    <?= Html::tag('p',
            Yii::t('app', 'Click on the <code>Save File(s)</code> button above to write the selected code file(s) to disk:'),
            ['class' => 'text-muted']
        ) ?>
    <div class="ui two column grid">
        <div class="column">
            <div class="ui icon large input">
                <?= Html::textInput('filter_input', '', ['placeholder' => Yii::t('app', 'Type to filter')]) ?>
                <?= Elements::icon('search small link') ?>
            </div>
        </div>
        <div class="column right aligned">
            <div class="ui small buttons">
                <label class="ui button" title="Filter created files">
                    <?= Checkbox::widget([
                            'name' => 'create__btn',
                            'inputOptions' => ['value' => CodeFile::OP_CREATE],
                            'checked' => true,
                            'label' => Yii::t('app', 'Create'),
                        ]) ?>
                </label>
                <label class="ui button" title="Filter unchanged files">
                    <?= Checkbox::widget([
                            'name' => 'unchanged__btn',
                            'inputOptions' => ['value' => CodeFile::OP_SKIP],
                            'checked' => true,
                            'label' => Yii::t('app', 'Unchanged'),
                        ]) ?>
                </label>
                <label class="ui button" title="Filter overwritten files">
                    <?= Checkbox::widget([
                            'name' => 'overwrite__btn',
                            'inputOptions' => ['value' => CodeFile::OP_OVERWRITE],
                            'checked' => true,
                            'label' => Yii::t('app', 'Overwrite'),
                        ]) ?>
                </label>
            </div>
        </div>
    </div>

    <table class="ui celled striped teal table">
        <thead>
            <tr>
                <th class="file"><?= Yii::t('app', 'Code File') ?></th>
                <th class="action"><?= Yii::t('app', 'Action') ?></th>
            <?php
                $fileChangeExists = false;
                foreach ($files as $file) :
                    if ($file->operation !== CodeFile::OP_SKIP) :
                        $fileChangeExists = true;
                        echo Html::beginTag('th', ['class' => 'center aligned']);
                            echo Checkbox::widget([
                                    'name' => 'check_all__btn',
                                    'checked' => true,
                                    'inputOptions' => ['id' => 'check-all'],
                                    'labelOptions' => ['label' => false]
                                ]);
                        echo Html::endTag('th');
                        break;
                    endif;
                endforeach ?>
            </tr>
        </thead>
        <tbody id="files-body">
        <?php
            foreach ($files as $file):
                if ($file->operation === CodeFile::OP_OVERWRITE) :
                    $trClass = 'warning';
                elseif ($file->operation === CodeFile::OP_SKIP) :
                    $trClass = 'active';
                elseif ($file->operation === CodeFile::OP_CREATE) :
                    $trClass = 'success';
                else :
                    $trClass = '';
                endif ?>
            <tr class="<?= "$file->operation $trClass" ?>">
                <td class="file">
                    <?= Html::a(Html::encode($file->getRelativePath()),
                                ['preview', 'id' => $id, 'file' => $file->id],
                                ['class' => 'preview-code', 'data-title' => $file->getRelativePath()]) ?>
                    <?php
                    if ($file->operation === CodeFile::OP_OVERWRITE):
                        echo Html::a('diff',
                                    ['diff', 'id' => $id, 'file' => $file->id],
                                    [
                                        'class' => 'diff-code label label-warning',
                                        'data-title' => $file->getRelativePath()
                                    ]);
                    endif ?>
                </td>
                <td class="action">
                <?php
                    if ($file->operation === CodeFile::OP_SKIP) :
                        echo 'unchanged';
                    else :
                        echo $file->operation;
                    endif ?>
                </td>
                <?php if ($fileChangeExists) : ?>
                <td class="check center aligned">
                <?php
                    if ($file->operation === CodeFile::OP_SKIP) :
                        echo '&nbsp;';
                    else :
                        echo Checkbox::widget([
                                'name' => "selectedFiles[{$file->id}]",
                                'checked' => isset($selectedFiles) ? isset($selectedFiles[$file->id]) : ($file->operation === CodeFile::OP_CREATE),
                                'labelOptions' => ['label' => false]
                            ]);
                    endif ?>
                </td>
                <?php endif ?>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?= $this->render('@appMain/views/_modal/modal', [
            'modalId' => 'preview--modal',
            'modalTitle' => 'Code File Preview',
            'positiveLabel' => 'OK',
            'negativeLabel' => 'Cancel',
            // 'closeButton' => '',
            'header' => <<<HTML
                <div class="ui buttons">
                    <a class="modal--previous compact ui mini icon button" title="Previous File (Left Arrow)">
                        <i class="arrow left"></i>
                    </a>
                    <a class="modal--next compact ui mini icon button" title="Next File (Right Arrow)">
                        <i class="arrow right"></i>
                    </a>
                    <a class="modal--refresh compact ui mini icon button" title="Refresh File (R)">
                        <i class="refresh"></i>
                    </a>
                    <a class="modal--checkbox compact ui mini icon button" title="Check This File (Space)">
                        <i class="check"></i>
                    </a>
                </div>
                <strong class="modal--title left floated">Modal title</strong>
                <span class="modal--copy-hint right floated"><kbd>CTRL</kbd>+<kbd>C</kbd> to copy</span>
                <div id="clipboard-container">
                    <textarea id="clipboard"></textarea>
                </div>
            HTML,
            'headerOptions' => [],
            'content' => '',
            'contentOptions' => [],
            'actions' => '',
            'actionsOptions' => [],
            // 'type' => '',
            // 'fullscreen' => '',
            // 'size' => '',
        ]) ?>
</div>