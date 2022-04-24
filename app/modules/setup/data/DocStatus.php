<?php

return [
    [
        'id' => 0,
        'name' => 'Draft', // label
        'description' => 'Saved, but not confirmed. May also be deleted',
        'color' => 'red',
        'rule' => false // user has create permission
    ],
    [
        'id' => 1,
        'name' => 'Submitted', // label
        'description' => 'Posted permanently, but can be cancelled (reversed)',
        'color' => 'blue',
        'rule' => false // user has submit permission
    ],
    [
        'id' => 2,
        'name' => 'Cancelled', // label
        'description' => 'Removed as posted transaction, but still preserved',
        'color' => 'red',
        'rule' => false // user has cancel permission
    ],
    [
        'id' => 3,        
        'name' => 'Paid', // label
        'description' => 'Transaction has partial or full payment made for it',
        'color' => 'green',
        'rule' => '{$model->hasPayment == true}',
    ],
    [
        'id' => 4,
        'name' => 'Unpaid',
        'description' => 'Transaction is already posted, but has no payment made to it',
        'color' => 'orange',
        'rule' => '{$model->status == "Submitted" && $model->hasPayment == false}',
    ],
    [
        'id' => 5,
        'name' => 'Overdue',
        'description' => 'Transaction has outstanding balance and due_date is past',
        'color' => 'red',
        'rule' => '{$model->due_date < $model->today && $model->hasUnpaidBalance == true}',
    ],
    // [
            // 'Open' => 'Open'
            // Default state of document/transaction until fully settled/cancelled
    // ],
    // [
            // 'Closed' => 'Closed'
            // visible if document/transaction not yet Submitted. Payment handling ?
    // ],
];