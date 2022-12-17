<?php

namespace crudle\app\main\enums;

class Type_Model
{
    const ActiveRecord = 'ActiveRecord';
    const Form = 'Form';

    public static function enums()
    {
        return [
        ];
    }

    public static function modelClasses()
    {
        $modelClasses = [];
        // app modules
        // $modelClasses = App::getModelClasses();
        // main sub modules
        // $modelClasses = array_merge($modelClasses, App::getModelClasses());
        // ext modules
        // $modelClasses = array_merge($modelClasses, App::getModelClasses());
        return $modelClasses;
    }
}
