<?php

namespace app\workflows;

class Forwarding
{
    private $_forwarded = false;

    public function isForwarded()
    {
        return $this->_forwarded;
    }

}