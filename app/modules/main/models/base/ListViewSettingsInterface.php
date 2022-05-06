<?php

namespace crudle\app\main\models\base;

interface ListViewSettingsInterface
{
    public static function listNameAttribute();
    public static function listIdAttribute();
    public static function listStatusAttribute();
    public static function defaultListViewColumns();
    public static function showListActions();
    public static function isEditable();
    public static function defaultFilters();
    public static function filterColumns();
    public static function isSortable();
    public static function defaultSortOrder();
    public static function showCommentsCount();
    public function showLatestCommentsOnHover();
    public static function showLastUpdate();
    public function showLastUpdateByOnHover();
    public static function showPagination();
    public static function defaultRowsPerPage();
    public static function storeListViewState();
}