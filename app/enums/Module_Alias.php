<?php

namespace crudle\app\enums;

class Module_Alias
{
    const Main      = '@appMain';
    const Setup     = '@appSetup';
    const WebCMS    = '@webCms';
    const Kit       = '@appKit';
    const Ext       = '@extModules';
    const User      = '@userModules';

    const AppNsPathname  = 'app';
    const KitNsPathname  = 'kit';
    const ExtNsPathname  = 'ext';
    const UserNsPathname = 'user';

    public static function enums()
    {
        return [
            self::Main      => self::Main,
            self::Setup     => self::Setup,
            self::WebCMS    => self::WebCMS,
            self::Kit    => self::Kit,
            self::Ext    => self::Ext,
            self::User    => self::User,
        ];
    }

    public static function nsPathname()
    {
        return [
            self::Main => self::AppNsPathname,
            self::Setup => self::AppNsPathname,
            self::WebCMS => self::AppNsPathname,
            self::Kit => self::KitNsPathname,
            self::Ext => self::ExtNsPathname,
            self::User => self::UserNsPathname,
        ];
    }
}
