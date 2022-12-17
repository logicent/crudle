<?php

$controller = $this->context;
$layoutPath = '@appMain/layouts/';

$this->beginContent($layoutPath . 'base.php') ?>

<div class="main ui three column stackable grid pusher" style="margin-top: <?= $controller->id == 'main/dashboard' ? '103px;' : '133px;' ?>">
    <?= $this->render('_main_sidebar') ?>
<?php
    if ($controller->id !== 'main' &&
        $controller->showViewSidebar()) : ?>
    <div class="computer only large screen only <?= $controller->sidebarColWidth() ?> wide column">
        <!-- side view loads here -->
    <?php
        if (file_exists($controller->viewPath . '/_sidebar.php')) :
            echo $this->renderFile($controller->viewPath . '/_sidebar.php', ['context' => $controller]);
        endif ?>
    </div>
<?php endif ?>
    <div id="content"
        class="
        <?= $controller->id !== 'main' && $controller->showViewSidebar() ?
            $controller->mainColumnWidth() : 
            $controller->fullColumnWidth() ?> wide column"
        style="padding-top: 0.25rem;">
        <?= $this->render($layoutPath . '_flash_message', ['context' => $controller]) ?>
        <!-- main view loads here -->
        <?= $content ?>
    </div>
</div>
<?php
    $this->registerCssFile("@web/css/main.css");
$this->endContent();
