<?php

namespace crudle\app\workflows;

class Approval
{
    // type enums
    const TypeSingle = 'Single';
    const TypeMultiple = 'Multiple';

    // sub type enums
    const MultipleSequential = 'Sequential'; // i.e. Multi-level
    const MultipleParallel = 'Parallel';

    private $_type;
    
}