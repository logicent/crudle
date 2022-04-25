<?php

use yii\helpers\Html;
use crudle\kit\CodeFile;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;

/* @var $this \yii\web\View */
/* @var $generator \crudle\kit\Generator */
/* @var $files CodeFile[] */
/* @var $answers array */
/* @var $id string panel ID */

?>
<div class="default-view-files">
    <p>Click on the above <code>Generate</code> button to generate the files selected below:</p>

    <div class="ui two column grid">
        <div class="column">
            <?= Html::beginForm('#', 'get', [
                        'class' => 'ui form',
                        'autocomplete' => 'off'
                    ]) ?>
                <div class="ui icon large input">
                    <?= Html::textInput('filter_input', '', ['placeholder' => Yii::t('app', 'Type a filter')]) ?>
                    <?= Elements::icon('search small link') ?>
                </div>
            <?= Html::endForm() ?>
        </div>
        <div class="column right aligned">
            <div class="ui small buttons">
                <label class="ui positive button" title="Filter created files">
                    <?= Checkbox::widget([
                            'name' => 'create__btn',
                            'inputOptions' => ['value' => CodeFile::OP_CREATE],
                            'checked' => true,
                            'label' => 'Create',
                            'labelOptions' => ['style' => 'color: white !important;']
                        ]) ?>
                </label>
                <label class="ui button" title="Filter unchanged files">
                    <?= Checkbox::widget([
                            'name' => 'unchanged__btn',
                            'inputOptions' => ['value' => CodeFile::OP_SKIP],
                            'checked' => true,
                            'label' => 'Unchanged'
                        ]) ?>
                </label>
                <label class="ui button" title="Filter overwritten files">
                    <?= Checkbox::widget([
                            'name' => 'overwrite__btn',
                            'inputOptions' => ['value' => CodeFile::OP_OVERWRITE],
                            'checked' => true,
                            'label' => 'Overwrite'
                        ]) ?>
                </label>
            </div>
        </div>
    </div>

    <table class="ui celled striped table">
        <thead>
            <tr>
                <th class="file">Code File</th>
                <th class="action">Action</th>
                <?php
                $fileChangeExists = false;
                foreach ($files as $file) {
                    if ($file->operation !== CodeFile::OP_SKIP) {
                        $fileChangeExists = true;
                        echo Html::beginTag('th', ['class' => 'center aligned']);
                        echo Checkbox::widget([
                                'name' => 'check_all__btn',
                                'inputOptions' => ['id' => 'check-all'],
                                'labelOptions' => ['label' => false]
                        ]);
                        echo Html::endTag('th');
                        break;
                    }
                }
                ?>
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
                endif;
            ?>
            <tr class="<?= "$file->operation $trClass" ?>">
                <td class="file">
                    <?= Html::a(Html::encode($file->getRelativePath()), ['preview', 'id' => $id, 'file' => $file->id], ['class' => 'preview-code', 'data-title' => $file->getRelativePath()]) ?>
                    <?php if ($file->operation === CodeFile::OP_OVERWRITE): ?>
                        <?= Html::a('diff', ['diff', 'id' => $id, 'file' => $file->id], ['class' => 'diff-code label label-warning', 'data-title' => $file->getRelativePath()]) ?>
                    <?php endif; ?>
                </td>
                <td class="action">
                    <?php
                    if ($file->operation === CodeFile::OP_SKIP) {
                        echo 'unchanged';
                    } else {
                        echo $file->operation;
                    }
                    ?>
                </td>
                <?php if ($fileChangeExists): ?>
                <td class="check center aligned">
                <?php
                    if ($file->operation === CodeFile::OP_SKIP) :
                        echo '&nbsp;';
                    else :
                        echo Checkbox::widget([
                                'name' => "answers[{$file->id}]",
                                'checked' => isset($answers) ? isset($answers[$file->id]) : ($file->operation === CodeFile::OP_CREATE),
                                'labelOptions' => ['label' => false]
                        ]);
                    endif ?>
                </td>
                <?php endif ?>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <div class="ui modal fade" id="preview-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="btn-group pull-left">
                        <a class="modal-previous btn btn-xs btn-default" href="#" title="Previous File (Left Arrow)"><span class="glyphicon glyphicon-arrow-left"></span></a>
                        <a class="modal-next btn btn-xs btn-default" href="#" title="Next File (Right Arrow)"><span class="glyphicon glyphicon-arrow-right"></span></a>
                        <a class="modal-refresh btn btn-xs btn-default" href="#" title="Refresh File (R)"><span class="glyphicon glyphicon-refresh"></span></a>
                        <a class="modal-checkbox btn btn-xs btn-default" href="#" title="Check This File (Space)"><span class="glyphicon"></span></a>
                        &nbsp;
                    </div>
                    <strong class="modal-title pull-left">Modal title</strong>
                    <span class="modal-copy-hint pull-right"><kbd>CTRL</kbd>+<kbd>C</kbd> to copy</span>
                    <div id="clipboard-container"><textarea id="clipboard"></textarea></div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-body">
                    <p>Please wait ...</p>
                </div>
            </div>
        </div>
    </div>
</div>