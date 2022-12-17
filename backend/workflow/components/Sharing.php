<?php

namespace crudle\app\workflow\components;

class Sharing
{
    private $_sharedWith;

    public function isSharedWith()
    {
        return $this->_sharedWith;
    }
}