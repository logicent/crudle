<?php

use crudle\app\main\enums\Type_Form_View;
use crudle\app\main\enums\Type_View;

$controller = $this->context;
$layoutPath = '@appMain/views/_layouts/';

$this->beginContent($layoutPath . 'base.php') ?>

<?= $this->render('_main_sidebar') ?>

<div class="main ui container pusher" style="margin-top: <?= $controller->id == 'main/dashboard' ? '103px;' : '133px;' ?> margin-left:142px;">
    <div class="ui stackable grid">
        <?php
            if ($controller->id !== 'main' &&
                $controller->showViewSidebar()) : ?>
            <div class="computer only large screen only <?= $controller->sidebarColWidth() ?> wide column">
                <!-- <div class="ui rail"> -->
                    <!-- <div class="ui sticky"> -->
                    <?php
                        if ($controller->mapActionViewType() == Type_View::Form) :
                            switch ($controller->formViewType()) :
                                case Type_Form_View::Single:
                                    echo $this->render('@appMain/views/crud/_sidebar');
                                    break;
                                case Type_Form_View::Multiple:
                                    if (file_exists($controller->viewPath . '/_sidebar.php')) :
                                        echo $this->renderFile($controller->viewPath . '/_sidebar.php');
                                    else :
                                        echo $this->render('@appMain/views/_form/_sidebar');
                                    endif;
                                    break;
                            endswitch;
                        endif;
                        if ($controller->mapActionViewType() == Type_View::List) :
                            echo $this->render('@appMain/views/crud/_sidebar');
                        endif;
                    ?>
                    <!-- </div> -->
                <!-- </div> -->
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

<?php
    $this->registerCssFile("@web/css/main.css");
$this->endContent() ?>
