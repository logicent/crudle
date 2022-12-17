<?php

namespace crudle\app\crud\helpers;

use yii\helpers\ArrayHelper;

class SelectableItems
{
    public static function get( $listModelClass, $formModel, $viewItemsConfig = [] )
    {
        $listItems = [];

        $defaultItemsConfig = ArrayHelper::toArray( (new SelectableItemsConfig())->get() );
        $itemsConfig = $defaultItemsConfig;
        // merge model ItemsConfig to override default values
        if ( !empty( $listModelClass::selectableItemsConfig() ))
            $itemsConfig = ArrayHelper::merge( $defaultItemsConfig, $listModelClass::selectableItemsConfig() );
        // merge viewItemsConfig to override default and/or model values
        if ( !empty( $viewItemsConfig ))
            $itemsConfig = ArrayHelper::merge( $itemsConfig, $viewItemsConfig );

        $itemQuery = $listModelClass::find();
        if (!empty($itemsConfig['join'])) {
            $itemQuery->alias($itemsConfig['alias']);
            $itemQuery->joinWith($itemsConfig['join'], false);
        }

        if ( !empty( $itemsConfig['groupAttribute'] )) {
            if (!empty($itemsConfig['join']))
                $itemQuery->select( $itemsConfig['alias'].'.'.$itemsConfig['keyAttribute'],
                                    $itemsConfig['valueAttribute'],
                                    $itemsConfig['groupAttribute']
                            );
            else
                $itemQuery->select( $itemsConfig['keyAttribute'],
                                    $itemsConfig['valueAttribute'],
                                    $itemsConfig['groupAttribute']
                            );
        }
        else {
            if (!empty($itemsConfig['join']))
                $itemQuery->select([
                    $itemsConfig['alias'].'.'.$itemsConfig['keyAttribute'],
                    $itemsConfig['valueAttribute'],
                ]);
            else
                $itemQuery->select([
                    $itemsConfig['keyAttribute'],
                    $itemsConfig['valueAttribute'],
                ]);
        }
        // if ( $itemsConfig['applyListModelFilters'] )
        //     $itemQuery->where( $listModelClass::defaultListFilters() );

        foreach ( $itemsConfig['filters'] as $column => $value ) {
            if ( is_array( $value ))
                $itemQuery->andWhere( $value );
            else
                $itemQuery->andWhere([ $column => $value ]);
        }
        if ( !empty( $itemsConfig['sortOrder'] ))
            $itemQuery->orderBy( $itemsConfig['sortOrder'] );

        if ( $itemsConfig['fetchAsArray'] )
            $itemQuery->asArray();

        $result = $itemQuery->all();

        if ( $itemsConfig['mapListResult'] ) {
            if ( !empty( $itemsConfig['groupAttribute'] ))
                $listItems = ArrayHelper::map( $result,
                                            $itemsConfig['keyAttribute'],
                                            !empty($itemsConfig['displayLabel']) ? $itemsConfig['displayLabel'] : $itemsConfig['valueAttribute'],
                                            $itemsConfig['groupAttribute'],
                                        );
            else
                $listItems = ArrayHelper::map( $result, 
                                            $itemsConfig['keyAttribute'],
                                            !empty($itemsConfig['displayLabel']) ? $itemsConfig['displayLabel'] : $itemsConfig['valueAttribute']
                                        );
        }
        else
            $listItems = $result;

        if ( 
            $itemsConfig['mapListResult'] &&
            $itemsConfig['addEmptyFirstItem']
        )
            $listItems = ArrayHelper::merge( self::_emptyArrayItem(), $listItems );

        // if ( $itemsConfig['addSelectedFieldValue'] )
        //     $listItems = self::_addSelectedFieldValue( $listItems, $formModel, $itemsConfig['keyAttribute'] );

        return $listItems;
    }

    private static function _emptyArrayItem()
    {
        return [' ' => ' '];
    }

    private static function _addSelectedFieldValue( &$listItems, $formModel, $keyAttribute )
    {
        $fieldValue = $formModel->$keyAttribute;
        return array_unshift( $listItems, [ $fieldValue => $fieldValue ] );
    }
}
