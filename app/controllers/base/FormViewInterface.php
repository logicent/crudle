<?php

namespace app\controllers\base;

interface FormViewInterface
{
    public function showQuickEntry();
    // public function hasDetailForms();
    public function detailForms();
    // public function hasSections();
    public function sections();
    // public function foldedSections();
    public function fieldColumns();
    // public function fields();
    public function hiddenFields();
    public function requiredFields();
}