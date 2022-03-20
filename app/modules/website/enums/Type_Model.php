<?php

namespace app\modules\website\enums;

use app\modules\website\models\AboutPage;
use app\modules\website\models\ContactPage;
use app\modules\website\models\WebForm;
use app\modules\website\models\WebPage;
use app\modules\website\models\WebsiteSettingsForm;
use app\modules\website\models\BlogArticle;
use app\modules\website\models\BlogCategory;
use app\modules\website\models\BlogWriter;

class Type_Model
{
    const AboutPage = 'About Page';
    const BlogArticle   = 'Blog Article';
    const BlogCategory  = 'Blog Category';
    const BlogWriter    = 'Blog Writer';
    const ContactPage   = 'Contact Page';
    const WebForm   = 'Web Form';
    const WebPage   = 'Web Page';
    const WebsiteSettingsForm   = 'Website Settings Form';

    public static function enums()
    {
        return [
            self::AboutPage =>  self::AboutPage,
            self::BlogArticle   =>  self::BlogArticle,
            self::BlogCategory  =>  self::BlogCategory,
            self::BlogWriter    =>  self::BlogWriter,
            self::ContactPage   =>  self::ContactPage,
            self::WebForm   =>  self::WebForm,
            self::WebPage   =>  self::WebPage,
            self::WebsiteSettingsForm   =>  self::WebsiteSettingsForm,
        ];
    }

    public static function modelClasses()
    {
        return [
            self::AboutPage => AboutPage::class,
            self::BlogArticle   => BlogArticle::class,
            self::BlogCategory  => BlogCategory::class,
            self::BlogWriter    => BlogWriter::class,
            self::ContactPage   => ContactPage::class,
            self::WebForm   => WebForm::class,
            self::WebPage   => WebPage::class,
            self::WebsiteSettingsForm   => WebsiteSettingsForm::class,
        ];
    }
}
