<?php

namespace app\modules\main\models\base;

interface AutoincrementIdInterface
{
    // define transaction document prefix
    public function docNumPrefix();

    // define transaction document id
    public function docNumPreset();
}