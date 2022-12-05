<?php

namespace crudle\app\workflows;

class Assignment
{
    // type enums
    const TypeSingle = 'Single';
    const TypeMultiple = 'Multiple';

    // Single sub type enums
    const SingleUser = 'Single User';
    const SingleRole = 'Single Role';
    const SingleUnit = 'Single Unit';

    // Multiple sub type enums
    const MultipleUsers = 'Multiple Users';
    const MultipleRoles = 'Multiple Roles';
    const MultipleUnits = 'Multiple Units';

    public $type;

    public $assignTo;

    // assignTo( $model, $attribute, $id )
    // assignToMultiple( $model, $attribute, $ids )

    // reAssignTo( $model, $attribute, $id )
    // reAssignToMultiple( $model, $attribute, $ids )

}