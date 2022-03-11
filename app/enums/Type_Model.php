<?php

namespace app\enums;

// Page
// use app\models\Help;
use app\models\Report;
use app\modules\setup\models\Setup;

use app\models\auth\People;
use app\modules\setup\models\EmailNotification;
use app\modules\setup\models\EmailQueue;
use app\modules\setup\models\ReportBuilder;
use app\modules\setup\models\ReportBuilderItem;
use app\modules\setup\models\PrintFormat;
use app\modules\setup\models\PrintStyle;

use app\modules\setup\models\DocType;

// Data Model

class Type_Model
{
    // Business Document Models
    const DocType               = 'Doc Type';
    // const EmailDigest           = 'Email Digest';
    const EmailNotification     = 'Email Notification';
    const EmailQueue            = 'Email Queue';
    // const EmailTemplate         = 'Email Template';
    const ReportBuilder         = 'Report Builder';
    const Role                  = 'Role';
    const PrintFormat           = 'Print Format';
    const PrintStyle            = 'Print Style';

    // Page (non-CRUD) models
    // const Help                  = 'Help';
    const People                = 'People';
    const Report                = 'Report';
    const Setup                 = 'Setup';

    public static function enums()
    {
        return [
            self::DocType            => self::DocType,
            self::EmailNotification     => self::EmailNotification,
            self::EmailQueue            => self::EmailQueue,
            self::People                => self::People,
            self::ReportBuilder         => self::ReportBuilder,
            self::Role                  => self::Role,
            self::PrintFormat           => self::PrintFormat,
            self::PrintStyle            => self::PrintStyle,
            self::Setup                 => self::Setup,
        ];
    }

    public static function modelClasses()
    {
        return array_merge(self::domainModelClass(), self::coreModelClass());
    }

    public static function domainModelClass()
    {
        return [
        ];
    }

    public static function domainModelSubclass()
    {
        return [
        ];
    }

    public static function coreModelClass()
    {
        return [
            self::DocType        => DocType::class,
            self::EmailNotification => EmailNotification::class,
            self::EmailQueue        => EmailQueue::class,
            self::People            => People::class,
            self::Report            => Report::class,
            self::PrintFormat       => PrintFormat::class,
            self::PrintStyle        => PrintStyle::class,
            self::ReportBuilder     => ReportBuilder::class,
            self::Setup             => Setup::class,
        ];
    }
}
