<?php

namespace app\workflows;

class Approval
{
    // Single vs Multiple - Sequential i.e. Multi-level or Parallel
    const TypeSingle = 'Single';
    const TypeMultiple = 'Multiple';

    const MultipleSequential = 'Sequential';
    const MultipleParallel = 'Parallel';

    private $_type;
    
}