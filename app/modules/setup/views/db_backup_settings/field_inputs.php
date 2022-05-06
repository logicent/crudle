<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use crudle\app\assets\SweetAlertAsset;

SweetAlertAsset::register($this);

$this->title = Yii::t('app', 'Database Backup');
?>

<div class="ui secondary bottom attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <!-- include / exclude tables -->
            <!-- hide/re-gen columns in tables -->
            <?= Html::a(Yii::t('app', 'Delete all data'), ['delete-all'],
                    [
                        'id' => 'delete_all_data',
                        'class' => 'compact ui button',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete all data?'),
                            'method' => 'post',
                        ]
                    ]) ?>
        </div>
        <div class="right aligned column">
            <!-- include / exclude tables -->
            <!-- hide/re-gen columns in tables -->
            <?= Html::a(Yii::t('app', 'Clear dump'), ['clear-dump'],
                    [
                        'id' => 'clear_db_dump',
                        'class' => 'compact ui button',
                    ]) ?>
            <?= Html::a(Yii::t('app', 'Dump database'), ['db-dump'],
                    [
                        'id' => 'create_db_dump',
                        'class' => 'compact ui button',
                    ]) ?>
            <div class="ui basic segment">
        <?php
            $backups = $this->context->backups;
            rsort($backups); // sort by latest first
            foreach ($backups as $backup) :
                $filename = \yii\helpers\StringHelper::basename($backup);
                echo Html::tag('div',
                    Html::a($filename .'&ensp;'. Elements::icon('download'), [Yii::getAlias('@web/dbdump/') . $filename],
                        [
                            'id' => 'db_dump_download',
                        ])
                    ) . Html::tag('br');
            endforeach ?>
            </div>
        </div>
    </div>
</div>
<?php
echo $this->render('@app_main/views/list/_delete');
$this->registerJs($this->render('@app_main/views/_form/_submit.js'));
$this->registerJs(<<<JS
    $('#delete_all_data').on('click', 
        function (e) {
            // e.preventDefault(); // use if data-confirm is not defined and return false not used below.
            delete_url = $(this).attr('href');
            confirmDelete(delete_url);
            return false; // this prevents the browser dialog from being loaded.
        }
    );

    $('#clear_db_dump, #create_db_dump').on('click', 
        function (e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: $(this).attr('href'),
                data: {
                },
            })
            .done(function (response) {
                alert(response);
                // refresh form 
                $('.item.active').click();
            })
            .fail(function () {
                // request failed
            });
    });
JS)
?>
