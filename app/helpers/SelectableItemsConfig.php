<?php

namespace crudle\app\helpers;

class SelectableItemsConfig
{
    public function get()
    {
        return [
            // 'modelClass' => '',
            'keyAttribute' => 'id', // default - must exist in source tables
            'valueAttribute' => 'description', // default if not overridden
            'groupAttribute' => null,
            'displayLabel' => null,
            'filters' => [],
            'sortOrder' => null, // 'description ASC',
            'fetchAsArray' => true,
            'mapListResult' => true,
            'addEmptyFirstItem' => true, // only applicable if 'mapListResult' == true
            'addSelectedFieldValue' => true, // only if model->isNewRecord == false
            // may require form model instance
            'applyListModelFilters' => true,
            'addAdvancedSearchLink' => false, // loads advanced search modal form
            'addCreateListItemLink' => false, // loads quick form modal if exists
            'refreshListItemsAfterCreate' => true,
            'selectAddedItemAfterRefresh' => true,
        ];
    }
}