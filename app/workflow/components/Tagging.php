<?php

namespace crudle\app\workflows;

class Tagging
{
    const TypePredefined = 'Predefined';
    const TypeUserDefined = 'User-defined';

    private $_tags = [];
    private $_tagged = false;

    public function isTagged()
    {
        return $this->_tagged;
    }

    public function getTags()
    {
        return $this->_tags;
    }
}