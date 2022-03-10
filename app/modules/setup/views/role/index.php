<?php

use app\enums\Status_Active;
use app\modules\setup\enums\Type_Role;
use app\models\auth\Person;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

$this->title = Yii::t('app', 'Role');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

$columns = [
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
    ];

echo $this->render('//_list/GridView', [
    'dataProvider'  => $dataProvider, 
    'searchModel'   => $searchModel,
    'columns'       => $columns
]) ?>
