<?php

use app\enums\Type_Role;
use app\enums\User_Group;
use app\helpers\DateTimeHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\Pjax;
use Zelenin\yii\SemanticUI\widgets\GridView;
use Zelenin\yii\SemanticUI\Elements;
use app\models\auth\Person;
use app\helpers\StatusMarker;

$this->title = Yii::t('app', 'People');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];

// Pjax::begin();
    echo GridView::widget([
        'layout' => "{items}\n{pager}", // {summary} {errors} {sorter}
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterRowOptions' => ['class' => 'filters', 'style' => 'display: none'],
        'columns' => [
            ['class' => 'Zelenin\yii\SemanticUI\widgets\CheckboxColumn'],

            [
                'attribute' => 'full_name',
                'format' => 'raw',
                'value' => function ($model) {
                    if (
                        Yii::$app->user->can('Update Own Person', ['model' => $model]) ||
                        Yii::$app->user->can(Type_Role::SystemManager) ||
                        Yii::$app->user->can(Type_Role::Administrator)
                    )
                        return 
                            Html::tag('div', 
                                Html::tag('div', 
                                            Html::a($model->full_name, 
                                                ['read', 'id' => $model->id], 
                                                ['style' => 'font-weight: 500']), 
                                        ['class' => 'ten wide column']
                                ) .
                                Html::tag('div', 
                                    $model->auth->username, 
                                    ['class' => 'six wide column right aligned text-muted']
                                ),
                                ['class' => 'ui two grid column']
                            );
                    // else
                    return $model->full_name;
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model)
                {
                    $marker = StatusMarker::icon('check circle', $model, 'status');
                    return $marker .'&nbsp;'. StatusMarker::label($model, 'status');
                },
                'contentOptions' => [
                    'style' => 'font-weight: 500',
                ],
                'filter' => [' ' => 'All', 
                    '1' => 'Active', 
                    '0' => 'Inactive', 
                ]
            ],
            [
                'attribute' => 'user_role',
                'value' => function ( $model ) {
                    return Person::getRoleByUserId( $model->auth->id );
                },
                'filter' => ArrayHelper::merge(
                        [' ' => Yii::t('app', 'All') ], 
                        ArrayHelper::map( Person::getRolesByName(), 'name', 'name' )
                    )
            ],
            [
                'attribute' => 'user_group',
                'filter' => [
                    ' ' => Yii::t('app', 'All'),
                    User_Group::enums(),
                ]
            ],
            [
                'attribute' => 'logged_on',
                'format' => 'boolean',
                'filter' => [
                    ' ' => Yii::t('app', 'All'),
                    '0' => Yii::t('app', 'No'),
                    '1' => Yii::t('app', 'Yes')
                ],
                'visible' => false
            ],
            [
                'attribute' => 'updated_at',
                'label' => false, 
                'header' => $dataProvider->getCount() . ' of ' . $dataProvider->getTotalCount(),
                'headerOptions' => ['class' => 'text-muted right aligned'],
                'filter' => false,
                'format' => 'raw',
                'value' => function ( $model ) {
                    return
                        Html::tag('span', 
                            DateTimeHelper::getShortRelativeTime( $model->updated_at ) .'&ensp;'. Elements::icon('comments outline', ['grey']) .'&nbsp;'. $model->commentsCount,
                            ['class' => 'text-muted']
                        );
                },
                'contentOptions' => [
                    'class' => 'right aligned text-muted'
                ]
            ],
        ],
    ]);
// Pjax::end();

$this->registerJs(<<<JS
    $('.grid-view').on('click', '.ui.checkbox', function(e) 
    {
        el_select_row = $(this).find(':checkbox');
        if (el_select_row.prop('checked'))
        {
            $('#delete_btn').show();
            $('#create_btn').hide();
        }
        else {
            // check for count of other selected rows
            if ($('.ui.checkbox.checked').length == 0)
            {
                $('#delete_btn').hide();
                $('#create_btn').show();
            }
        }
    });
JS) ?>
