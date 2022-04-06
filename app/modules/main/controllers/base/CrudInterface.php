<?php

namespace app\modules\main\controllers\base;

interface CrudInterface
{
    public function getModelClass();
    public function getSearchModelClass();
    public function getDetailModelClass();

    // public function redirectTo();
    public function redirectOnCreate(); // viewCreated?
    public function redirectOnUpdate(); // viewUpdated?
    public function redirectOnDelete();

    public function getModel(); // getViewModel()
    public function getSearchModel();
    public function getLinkedModels();
    public function getDetailModels();
}