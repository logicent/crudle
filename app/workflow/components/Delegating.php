<?php

namespace crudle\app\workflow\components;

class Delegating
{
    private $_delegated = false;

    public function isDelegated()
    {
        return $this->_delegated;
    }

}