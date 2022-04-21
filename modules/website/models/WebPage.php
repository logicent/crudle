<?php

namespace website\models;

use crudle\main\models\base\BaseActiveRecord;
use crudle\setup\models\ListViewSettingsForm;
use website\enums\Status_Article;

class WebPage extends BaseActiveRecord
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'title'; // override in view index
    }

    public static function tableName()
    {
        return 'site_page';
    }

    public function rules()
    {
        return [
            [['title', 'route'], 'required'],
            [['published', 'full_width', 'show_title'], 'boolean'],
            // slideshow
            // dynamic_route
            // start_date, end_date

            // Content: content_type: Rich Text, Markdown, HTML, Page Builder: Block
            // Page block
            // web_template, css_classes, Add Container, Add Space on Top, Add Space on Bottom, Add Gray Background, Hide Block

            // Context: context_script

            // Script: javascript

            // Style: insert_style, css, text_align

            // Sidebar and Comments: show_sidebar, website_sidebar, enable_comments, priority

            // Meta Tags: title, description, image and custom tags (route, key and value)
        ];
    }

    public static function enums()
    {
        return [
            'status' => Status_Article::class
        ];
    }
}
