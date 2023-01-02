<?php

use crudle\app\main\helpers\LayoutHelper as LH;

$controller = $this->context;
$layoutPath = '@appMain/layouts/';

$this->beginContent($layoutPath . 'base.php') ?>

<div class="main ui three column stackable grid pusher" style="<?= LH::sidebarMargin($controller) ?>">
    <div class="computer only large screen only one wide column" id="_sidebar_main" style="background: inherit">
        <?= $this->render('_main_sidebar') ?>
    </div>
<?php
    if ($controller->id !== 'main' && $controller->showViewSidebar()) : ?>
    <div class="computer only large screen only <?= $controller->sidebarColWidth() ?> wide column">
        <!-- side view loads here -->
    <?php
        if (file_exists($controller->viewPath . '/_sidebar.php') && $controller->action->id != 'index') :
            echo $this->renderFile($controller->viewPath . '/_sidebar.php', ['context' => $controller]);
        endif ?>
    </div>
<?php
    endif ?>
    <div id="content" class="<?= LH::colWidth($controller) ?> wide column" style="padding-top: 0.25rem;">
        <?= $this->render($layoutPath . '_flash_message', ['context' => $controller]) ?>
        <!-- main view loads here -->
        <?= $content ?>
    </div>
</div>
<?php
    $this->registerCssFile("@web/css/main.css");
$this->endContent();
