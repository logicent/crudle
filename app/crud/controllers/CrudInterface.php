<?php

namespace crudle\app\crud\controllers;

interface CrudInterface
{
    public function showQuickEntry(): bool;

    public function formViewType();

    // render form view in path
    public function formView(string $action = null, string $path = null);

    public function showLinkedData(): bool;

    public function showComments(): bool;

    // render comment view
    public function commentView(): string;

    // linked or parent models
    public function linkedModels(): array;

    // redirect to (url) after create
    public function redirectOnCreate();

    // refresh/reload model after create
    public function viewCreated(): bool;

    // redirect to (url) after update
    public function redirectOnUpdate();

    // refresh/reload model after update
    public function viewUpdated(): bool;

    // redirect to (url) after delete
    public function redirectOnDelete();

    // view is readonly
    public function isReadonly(): bool;
}