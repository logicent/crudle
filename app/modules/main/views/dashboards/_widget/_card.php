<?php

use yii\helpers\Inflector;

foreach ($count->queryAll() as $i => $data) :
        $text = isset($data[$column]) ? $data[$column] : $column;
?>
        <div class="ui small statistic">
                <div class="value"><?= $data['data'] ?></div>
                <div class="ui hidden divider"></div>
                <div class="text-muted"><?= Inflector::camel2words($text) ?></div>
        </div>
<?php endforeach;
