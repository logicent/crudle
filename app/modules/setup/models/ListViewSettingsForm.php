<?php

namespace crudle\setup\models;

use crudle\setup\models\base\BaseSettingsForm;
use Yii;

class ListViewSettingsForm extends BaseSettingsForm
{
    public $listModelClass;
    public $listNameAttribute = 'name';
    public $listIdAttribute;
    public $listStatusAttribute;
    public $defaultListViewColumns;
    public $userListViewColumns;
    public $showListActions = true;
    public $isEditable = false;
    public $filterColumns;
    public $defaultFilters;
    public $isSortable = true;
    public $defaultSortOrder;
    public $showCommentsCount = true;
    public $showLatestCommentsOnHover = false;
    public $showLastUpdate = true;
    public $showLastUpdateByOnHover = false;
    public $showPagination = true;
    public $defaultRowsPerPage = 20;
    public $storeListViewState = false;
    public $userFilters;
    public $userSortOrder;
    public $userRowsPerPage = null;

    public function rules()
    {
        return [
            [
                'listModelClass',
                'listNameAttribute',
                'listIdAttribute',
                'listStatusAttribute',
                'defaultListViewColumns',
                'userListViewColumns',
                'showListActions',
                'isEditable',
                'defaultFilters',
                'filterColumns',
                'isSortable',
                'defaultSortOrder',
                'showCommentsCount',
                'showLatestCommentsOnHover',
                'showLastUpdate',
                'showLastUpdateByOnHover',
                'showPagination',
                'defaultRowsPerPage',
                'storeListViewState',
                'userFilters',
                'userSortOrder',
                'userRowsPerPage'
            ], 'safe'
        ];
    }

    public function attributeLabels()
    {
        return [
            'listModelClass' => Yii::t('app', 'List model class'),
            'listNameAttribute' => Yii::t('app', 'List name attribute'),
            'listIdAttribute' => Yii::t('app', 'List Id attribute'),
            'listStatusAttribute' => Yii::t('app', 'List status attribute'),
            'defaultListViewColumns' => Yii::t('app', 'Default list view columns'),
            'userListViewColumns' => Yii::t('app', 'User list view columns'),
            'showListActions' => Yii::t('app', 'Show list actions'),
            'isEditable' => Yii::t('app', 'Is editable'),
            'defaultFilters' => Yii::t('app', 'Default filters'),
            'filterColumns' => Yii::t('app', 'Filter columns'),
            'isSortable' => Yii::t('app', 'Is sortable'),
            'defaultSortOrder' => Yii::t('app', 'Default sort order'),
            'showCommentsCount' => Yii::t('app', 'Show comments count'),
            'showLatestCommentsOnHover' => Yii::t('app', 'Show latest comments on hover'),
            'showLastUpdate' => Yii::t('app', 'Show last update'),
            'showLastUpdateByOnHover' => Yii::t('app', 'Show last update by on hover'),
            'showPagination' => Yii::t('app', 'Show pagination'),
            'defaultRowsPerPage' => Yii::t('app', 'Default rows per page'),
            'storeListViewState' => Yii::t('app', 'Store list view state'),
            'userFilters' => Yii::t('app', 'User filters'),
            'userSortOrder' => Yii::t('app', 'User sort order'),
            'userRowsPerPage' => Yii::t('app', 'User rows per page'),
        ];
    }
}
