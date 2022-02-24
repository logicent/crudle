<?php

namespace app\helpers;

class SelectedItem
{
    public static function get( $itemModelClass, $keyAttribute, $valueAttribute, $value )
    {
        // if (in_array('deleted_at', $itemModelClass::attributes())) :
        //     $itemQuery = $itemModelClass::find()->where(['deleted_at' => null]);
        // else :
            $itemQuery = $itemModelClass::find()->select($valueAttribute);
        // endif;

        if (is_array($value)) {
            $result = $itemQuery->where([ 'in', $keyAttribute, $value ])
                                ->column();
            if (!empty($result))
                $result = implode(', ', $result);
        }
        else
            $result = $itemQuery->where([ $keyAttribute => $value ])
                                ->scalar();
        return $result;
    }
}