<?php

use app\enums\Status_Active;
use app\enums\Type_Role;
use app\models\auth\Person;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\widgets\GridView;

$this->title = Yii::t('app', 'Role');
?>
<?= $this->render('/setup/_list/_header', ['context_id' => 'role/']) ?>

<div class="ui bottom attached padded segment">

<?= GridView::widget([
    'layout' => "{items}\n{pager}",
    'tableOptions' => [
        'class' => 'ui very basic table'
    ],
    'dataProvider' => $dataProvider,
    'columns' => [
        // ['class' => 'Zelenin\yii\SemanticUI\widgets\CheckboxColumn'],
        [
            'attribute' => 'name',
            'format' => 'raw',
            'value' => function ($model) {
                return 
                    Html::a($model->name, 
                            ['/setup/role-permission/update', 'id' => $model->name], 
                            [
                                'class' => 'show-list-form',
                                'data' => [
                                    'id' => $model->name,
                                ],
                                'style' => 'font-weight: 500',
                            ]);
            }
        ],
        [
            'attribute' => 'description',
            'contentOptions' => [
                'style' => 'white-space: normal;',
            ],
            'visible' => false
        ],
        [
            'attribute' => 'users',
            'format' => 'raw',
            'contentOptions' => [
                'style' => 'white-space: normal;',
            ],
            'value' => function ($model)
            {
                $authMan = Yii::$app->authManager;
                $userIds = $authMan->getUserIdsByRole( $model->name );
                $listNames = '';
                foreach ( $userIds as $userId )
                {
                    $user = Person::findOne(['id' => $userId, 'status' => Status_Active::Yes]);
                    if (!$user)
                        continue;

                    if (Yii::$app->user->can(Type_Role::SystemManager) || Yii::$app->user->can(Type_Role::Administrator))
                        $listNames .= Html::a($user->full_name,
                                            ['people/read', 'id' => $user->id],
                                            ['class' => 'ui label']);
                    else
                        $listNames .= Elements::label( $user->full_name );
                }

                return $listNames;
            }
        ],
        [
            'header' => $dataProvider->getCount() . ' of ' . $dataProvider->getTotalCount(),
            'headerOptions' => ['class' => 'text-muted right aligned'],
            'format' => 'raw',
            'value' => function () {
                return '&nbsp;';
            },
            'contentOptions' => [
                'class' => 'right aligned text-muted'
            ]
        ]
    ],
]) ?>
</div>