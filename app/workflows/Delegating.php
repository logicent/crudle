<?php

namespace app\workflows;

class Delegating
{
    private $_delegated = false;

    public function isDelegated()
    {
        return $this->_delegated;
    }

}