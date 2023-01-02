<?php

$controller = $this->context;
$layoutPath = '@appMain/layouts/';

$this->beginContent($layoutPath . 'base.php') ?>

<div class="main ui three column stackable grid pusher" style="margin-top: <?= $controller->id == 'app/dashboards' ? '103px;' : '133px;' ?>">
    <div class="computer only large screen only one wide column" id="_sidebar_main" style="background: inherit">
        <?= $this->render('@appMain/layouts/_main_sidebar') ?>
    </div>
<?php
    if ($controller->showViewSidebar()) : ?>
        <div class="computer only large screen only <?= $controller->sidebarColWidth() ?> wide column">
            <div class="ui sticky">
            <?php
                if (file_exists($controller->viewPath . '/_sidebar.php')) :
                    echo $this->renderFile($controller->viewPath . '/_sidebar.php');
                endif;
            ?>
            </div>
        </div>
<?php 
    endif ?>

    <div id="content"
        class="<?= $controller->showViewSidebar() ?
            $controller->mainColumnWidth() : $controller->fullColumnWidth() ?> wide column">
        <?= $this->render($layoutPath . '_flash_message', ['context' => $controller]) ?>
        <?= $content ?>
    </div>
</div>
<?php
    $this->registerCssFile("@web/css/report.css");
$this->endContent();