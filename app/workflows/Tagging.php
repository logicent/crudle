<?php

namespace app\workflows;

class Tagging
{
    const TypePredefined = 'Predefined';
    const TypeUserDefined = 'User-defined';

    private $_tags;
    private $_tagged;

    public function isTagged()
    {
        return $this->_tagged;
    }

    public function tags()
    {
        return $this->_tags;
    }
}