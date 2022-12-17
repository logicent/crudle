<?php

namespace crudle\app\crud\models;

interface AutoincrementIdInterface
{
    // define transaction document prefix
    public function docNumPrefix();

    // define transaction document id
    public function docNumPreset();
}