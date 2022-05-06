<?php

namespace crudle\ext\cms\enums;

class Status_Article
{
    const Draft   = 'Draft';
    const Published   = 'Published';
    const Archived  = 'Archived';

    const DraftColor    = 'orange';
    const PublishedColor= 'blue';
    const ArchivedColor = 'brown';


    public static function enums()
    {
        return [
            self::Draft  =>  self::Draft,
            self::Published   =>  self::Published,
            self::Archived =>  self::Archived,
        ];
    }

    public static function enumsColor()
    {
        return [
            self::Draft  =>  self::DraftColor,
            self::Published   =>  self::PublishedColor,
            self::Archived  =>  self::ArchivedColor,
        ];
    }
}