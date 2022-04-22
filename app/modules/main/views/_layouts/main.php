<?php

use crudle\main\enums\Type_Form_View;
use crudle\main\enums\Type_View;


$controller = $this->context;
$layoutPath = '@app_main/views/_layouts/';

$this->beginContent($layoutPath . 'base.php') ?>

<?= $this->render('_main_sidebar') ?>

<div class="main ui container pusher" style="margin-top: <?= $controller->id == 'dashboard' ? '103px;' : '133px;' ?>">
    <div class="ui stackable grid">
        <?php
            if ($controller->id !== 'main' &&
                $controller->showViewSidebar()) : ?>
            <div class="computer only large screen only <?= $controller->sidebarColWidth() ?> wide column">
                <!-- <div class="ui rail"> -->
                <div class="ui sticky">
                <?php
                    if ($controller->defaultViewType() == Type_View::List ||
                        $controller->formViewType() == Type_Form_View::Single) :
                        echo $this->render('@app_main/views/crud/_sidebar');
                    else :
                        if (file_exists($controller->viewPath . '/_sidebar.php')) :
                            echo $this->renderFile($controller->viewPath . '/_sidebar.php');
                        endif;
                    endif;
                ?>
                </div>
                <!-- </div>./ui rail -->
            </div>
        <?php endif ?>

        <div id="content"
            class="<?= $controller->id !== 'main' && $controller->showViewSidebar() ?
                $controller->mainColumnWidth() : $controller->fullColumnWidth() ?> wide column">
            <?= $this->render($layoutPath . '_flash_message', ['context' => $controller]) ?>
            <?= $content ?>
        </div>
    </div>
</div>

<?php $this->endContent() ?>
