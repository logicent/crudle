<?php

namespace crudle\app\crud\models;

interface ActiveRecordInterface
{
    // column name or expression in selectable items
    public static function selectableItemsConfig();
    // array of enum classes
    public static function enums();
    // array of relation classes
    public static function relations();
    // count(self::relations)
    public static function hasRelations();
    // relation have linked data
    public function links( $type );
    // count links > 0
    public function hasLinks();
    // supported permissions for model
    public static function permissions();
    // supported auth rules for model
    public static function authRules();
    // default audit table columns list
    public static function auditTableColumns();
    // user-defined custom fields in model
    public static function customFields();
    // count mixedValueFields > 0
    public function hasMixedValueFields();
    // json or concatenated field values
    public static function mixedValueFields();
    // auto suggest id
    public function autoSuggestId();
    // auto suggest id value
    public static function autoSuggestIdValue();
    // auto suggest id type
    public static function autoSuggestIdType();
    // auto suggest column filters
    public static function autoSuggestFilters();
    // auto suggest attribute
    public static function autoSuggestAttribute();
    // foreign key attribute
    public static function foreignKeyAttribute();
    // show list view
    public static function allowListView();
    // supported Type_View
    public static function viewType();
    // Type_Module
    public static function moduleType();
}