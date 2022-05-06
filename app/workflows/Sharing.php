<?php

namespace crudle\app\workflows;

class Sharing
{
    private $_sharedWith;

    public function isSharedWith()
    {
        return $this->_sharedWith;
    }
}