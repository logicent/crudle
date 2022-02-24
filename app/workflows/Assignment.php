<?php

namespace app\workflows;

class Assignment
{
    // Single vs Multiple based on user/role/unit
    const TypeSingle = 'Single';
    const TypeMultiple = 'Multiple';

    const SingleUser = 'Single User';
    const SingleRole = 'Single Role';
    const SingleUnit = 'Single Unit';

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