<?php

namespace crudle\main\controllers\base;

interface FormViewInterface
{
    public function formViewType(); // enum

    public function showLinkedData(): bool;

    public function showComments(): bool;

    // public function showQuickEntry(): bool;
    // public function hasDetailForms(): bool;
    // public function detailForms(): array;
    // public function hasSections(): bool;
    // public function sections(): array;
    // public function foldedSections(): array;
    // public function fieldColumns(): array;
    // public function fields(): array;
    // public function hiddenFields(): array;
    // public function requiredFields(): array;
}