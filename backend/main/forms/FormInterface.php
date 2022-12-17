<?php

namespace crudle\app\main\forms;

interface FormInterface
{
    // public function hasDetailForms(): bool;
    // public function detailForms(): array;
    // public function hasSections(): bool;
    // public function sections(): array;
    // public function foldedSections(): array;
    // public function fieldColumns(): array;
    public function fieldInputs(): array;
    // public function hiddenFields(): array;
    // public function requiredFields(): array;
}