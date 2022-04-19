<?php

namespace crudle\setup\models\base;

interface SettingsInterface
{
    public static function hasMixedValueFields(): bool;

    public static function mixedValueFields(): array;

    public static function relations(): array;
}