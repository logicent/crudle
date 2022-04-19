<?php

use app\enums\Status_Active;
use crudle\setup\enums\Type_Role;
use crudle\main\models\auth\Person;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

return [
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
                                            ['user/read', 'id' => $user->id],
                                            ['class' => 'ui label']);
                    else
                        $listNames .= Elements::label( $user->full_name );
                }

                return $listNames;
            }
        ],
    ];