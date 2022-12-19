<?php

namespace crudle\app\setting\models\base;

interface SettingsInterface
{
    public static function hasMixedValueFields(): bool;

    public static function mixedValueFields(): array;

    public static function relations(): array;
}