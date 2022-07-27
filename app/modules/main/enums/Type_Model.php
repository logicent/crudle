<?php

namespace crudle\app\main\enums;

// use crudle\app\main\models\AppModule;
use crudle\app\main\models\Dashboard;
use crudle\app\main\models\DataWidget;
use crudle\app\main\models\ReportBuilder;
use crudle\app\main\models\ReportTemplate;

class Type_Model
{
    // const AppModule         = 'App Module';
    const Dashboard         = 'Dashboard';
    const DataWidget        = 'Data Widget';
    const ReportBuilder     = 'Report Builder';
    const ReportTemplate    = 'Report Template';

    public static function enums()
    {
        return [
            // self::AppModule         => self::AppModule,
            self::Dashboard         => self::Dashboard,
            self::DataWidget        => self::DataWidget,
            self::ReportBuilder     => self::ReportBuilder,
            self::ReportTemplate    => self::ReportTemplate,
        ];
    }

    public static function modelClasses()
    {
        return [
            // self::AppModule     => AppModule::class,
            self::Dashboard     => Dashboard::class,
            self::DataWidget    => DataWidget::class,
            self::ReportBuilder => ReportBuilder::class,
            self::ReportTemplate => ReportTemplate::class,
        ];
    }
}
