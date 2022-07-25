<?php

namespace crudle\ext\web_cms\models;

use crudle\app\main\models\ActiveRecord;
use crudle\app\setup\models\ListViewSettingsForm;
use crudle\ext\web_cms\enums\Status_Article;

class WebForm extends ActiveRecord
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'title'; // override in view index
    }

    public static function tableName()
    {
        return 'site_form';
    }

    public function rules()
    {
        return [
            [['title', 'route'], 'required'],
            [['published', 'full_width', 'show_title'], 'boolean'],

            // Title, Route, Select Data Model, Module, Is Multi Step Form, Published, Login Required,
            // Apply Document Permissions, Allow Print, Allow Incomplete Forms
            // Introduction

            // Fieldname, Fieldtype, Label, Mandatory, Read Only, Show in filter, Hidden, Max Length
            // Max attachment size

            // client_script
            // custom_css
            // Actions: button_label, success_message, success_url
            // Sidebar Settings: show_sidebar, sidebar_items
            // Sidebar items: title, enabled, route, ref_data_model, role

            // Payments: accept_payments, payment_gateway, button_label, , button_help, amount_based_on_field, amount, currency
            // Advanced: web_page_link_text, breadcrumbs

        ];
    }

    public static function enums()
    {
        return [
            'status' => Status_Article::class
        ];
    }
}
