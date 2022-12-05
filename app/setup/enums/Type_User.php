<?php

namespace crudle\app\setup\enums;

class Type_User
{
    const WebUser       = 'Web User'; // guest user (external) - can login to frontend or receive system messages
    // const WebManager    = 'Web Manager'; // external web admin - manages web access and web site preferences
    const SystemUser    = 'System User'; // standard user @yourdomain - can login to backend and perform operations
    // const SystemManager = 'System Manager'; // internal system admin - manages system access and general setup
    // const Administrator = 'Administrator'; // restricted account - manages deployment options

    public static function enums()
    {
        return [
            self::WebUser       => self::WebUser,
            // self::WebManager    => self::WebManager,
            self::SystemUser    => self::SystemUser,
            // self::SystemManager => self::SystemManager,
            // self::Administrator => self::Administrator,
        ];
    }
}