<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;


$reports = $this->context->reports;

ArrayHelper::multisort($reports, 'id');
ArrayHelper::multisort($reports, 'group');
$reportGroups = ArrayHelper::map($reports, 'id', 'id', 'group');

?>

<div id="report_sidebar" class="page-sidebar">
    <?= $this->render('/_form_field/search_input', [
                    'filterClass' => 'searchList',
                    'showSortButtons' => false,
                    'showGroupButton' => true
                ]) ?>
    <div id="menu_list" class="ui secondary vertical pointing menu">
    <?php
        foreach ($reportGroups as $groupName => $groupList) :
            echo Html::tag('div', $groupName, [
                    'class' => 'ui sub header text-muted group', 
                    'style' => 'display: none'
                ]);

            foreach ( $reports as $report ) :
                if ( $report['group'] !== $groupName )
                    continue;
                // if ( !Yii::$app->user->can($report['roles']) )
                //     continue;
                echo Html::a(
                    Yii::t('app', '{setupMenuLabel}', ['setupMenuLabel' => $report['id']]),
                    Url::to(['reports/index', 'id' => $report['route']]),
                    ['class' => 'item']
                );
            endforeach;
        endforeach;
        ?>
    </div>
</div>

<?php
$this->registerJs(<<<JS
    //  Use transitions for better UX
    $('#report_sidebar .item').on('click', function(e) {
        e.preventDefault();

        item = $(this);
        $.ajax({
            url: $(this).attr('href'),
            type: 'get',
            data: {
                // _csrf: yii.getCsrfToken(),
            },
            success: function( response )
            {
                // change active item report in #sidebar
                $('.item.active').removeClass('active');
                item.addClass('active');
                // load the response view to shared 'tab'
                $('.ui.tab.active.segment').html(response);
            },
            error: function( jqXhr, textStatus, errorThrown )
            {
                console.log( errorThrown );
            }
        });
        return false;
    });

    $('.sort-list').on('click', function() {
        sortList();
    });
    // TODO: add sort direction - descending
    function sortList()
    {
        var list, i, switching, b, shouldSwitch;
        list = document.getElementById("report_list");
        switching = true;
        /* Make a loop that will continue until
        no switching has been done: */
        while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            b = list.getElementsByClassName("item");
            // Loop through all list items:
            for (i = 0; i < (b.length - 1); i++) {
                // Start by saying there should be no switching:
                shouldSwitch = false;
                /* Check if the next item should
                switch place with the current item: */
                if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
                    /* If next item is alphabetically lower than current item,
                    mark as a switch and break the loop: */
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                and mark the switch as done: */
                b[i].parentNode.insertBefore(b[i + 1], b[i]);
                switching = true;
            }
        }
    }
JS);