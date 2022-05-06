<?php

namespace crudle\app\workflows;

class Forwarding
{
    private $_forwarded = false;

    public function isForwarded()
    {
        return $this->_forwarded;
    }

}