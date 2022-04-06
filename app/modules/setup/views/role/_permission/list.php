<?php

use app\modules\main\enums\Type_Model;
use app\modules\setup\enums\Permission_Group;
use app\modules\setup\enums\Type_Permission;
use app\modules\main\models\auth\RolePermission;
use yii\helpers\Html;
use yii\helpers\Inflector;
use app\assets\DataTableAsset;
use yii\helpers\StringHelper;
use Zelenin\yii\SemanticUI\modules\Checkbox;

DataTableAsset::register($this);
?>

<div class="ui one column grid">
    <div class="center aligned column text-muted">
        <div class="compact ui buttons">
            <button id='select-all' class="ui button"><?= Yii::t('app', 'Select All') ?></button>
            <div class="or"></div>
            <button id='clear-all' class="ui button"><?= Yii::t('app', 'Clear All') ?></button>
        </div>
    </div>
</div>

<table id="resource_list" class="ui fixed single line celled table">
    <thead>
        <tr>
            <th onclick="sortTable()" class="text-muted"><?= Yii::t('app', 'Page/Data Model') ?></th>
            <?php
            foreach ( Type_Permission::enums() as $operation ) :
                echo Html::tag('th', $operation, [
                    'class' => 'center aligned text-muted',
                ]);
            endforeach ?>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ( Type_Model::modelClasses() as $modelClass ) :
            $resource = Inflector::camel2words(StringHelper::basename( $modelClass ));
        ?>
            <tr>
                <td style="background: #f5f7fa;"><?= $resource ?></td>
            <?php
                foreach ( Type_Permission::enums() as $operation ) :
                    if (! in_array( $operation, $modelClass::permissions() )) :
                        echo Html::tag( 'td', null, ['style' => 'background: #f9fafb;'] );
                        continue;
                    endif;
                    $permission = $operation . ' ' . $resource;
                    echo Html::tag( 'td',
                            Checkbox::widget([
                                'name' => 'Permission[' . $permission . ']',
                                'checked' => RolePermission::getValueIf( $permission, $model->name ),
                                'options' => ['class' => 'role-permission']
                            ]),
                            ['class' => 'center aligned']
                        );
                endforeach ?>
            </tr>
        <?php
        endforeach ?>
    </tbody>
</table>
<?php
$this->registerJs(<<<JS
    $('.ui .table').DataTable({
        stateSave: true,
        scrollX:        true,
        scrollY:        "500px",
        // scrollCollapse: true,
        paging:         false
    });
JS)
?>