<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;

?>
<form class="ui form">
    <div class="ui small icon input">
        <input type="text" id="search_text" class="<?= $filterClass ?>" style="padding: 8px; max-width: 204px;" placeholder=""/>
        <i id="clear_search" class="close link icon" style="display: none;"></i>
        <?php
        // if ($showSortButtons) :
        //     echo 
        //     Html::button(Elements::icon('sort alphabet down', ['class' => 'large']), [
        //         'class' => 'compact ui basic icon small button sort-list',
        //     ]) .
        //     Html::button(Elements::icon('sort alphabet up', ['class' => 'large']), [
        //         'class' => 'compact ui basic icon small button sort-list',
        //         'style' => 'display: none;'
        //     ]);
        // endif ?>
    </div>
        <?php
        if ($showGroupButton) :
            echo Html::button(Elements::icon('tasks', ['class' => 'blue large']), [
                'class' => 'ui small icon button toggle-group',
                'style' => 'padding: 0.75em; vertical-align: top'
            ]);
        endif ?>
</form>

<?php $this->registerJs(<<<JS
    $('.searchList').on('keyup', function() {
        if ($(this).val().length > 0)
            $('#clear_search').show();
        else
            $('#clear_search').hide();

        filterList();
    });

    function filterList() 
    {
        var searchInput, filterText, listWrapper, listItems, linkValue, i;

        searchInput = document.getElementById('search_text');
        filterText = searchInput.value.toUpperCase();
        listWrapper = document.getElementById("menu_list");
        listItems = listWrapper.getElementsByClassName('item');

        // loop through list items and hide the unmatched items
        for ( i = 0; i < listItems.length; i++) 
        {
            linkValue = listItems[i].textContent || listItems[i].innerText
            if (linkValue.toUpperCase().indexOf(filterText) > -1) {
                listItems[i].style.display = "";
            } else {
                listItems[i].style.display = "none";
            }
        }
    }

    $('.searchTable').on('keyup', function() {
        filterTableRows();
    });

    function filterTableRows()
    {
        var searchInput, filterText, table, tableRow, tableCol, cellValue, i;

        searchList = document.getElementById("search_text");
        filterTable = searchList.value.toUpperCase();
        table = document.getElementById("resource_list");
        tableRow = table.getElementsByTagName("tr");

        // loop through table rows and hide the unmatched columns
        for (i = 0; i < tableRow.length; i++) {
          td = tableRow[i].getElementsByTagName("td")[0];
          if (td) {
            cellValue = td.textContent || td.innerText;
            if (cellValue.toUpperCase().indexOf(filterTable) > -1) {
              tableRow[i].style.display = "";
            } else {
              tableRow[i].style.display = "none";
            }
          }
        }
    }

    $('.toggle-group').on('click', function(e) {
        $('.group').toggle();
    });

    $('#clear_search').on('click', function(e) {
        $('#search_text').val('');
        $('#search_text').trigger('keyup');
        $('#search_text').focus();
    });
JS);