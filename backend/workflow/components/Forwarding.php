<?php

namespace crudle\app\workflow\components;

class Forwarding
{
    private $_forwarded = false;

    public function isForwarded()
    {
        return $this->_forwarded;
    }

}