<?php

// file 'DocField.php'
return [
    // Audit / integrity controls
    'id', // varchar (140) - code, name, doc_num or doc_id - (PK)
    'created_at',
    'created_by', // varchar (140) 
    'updated_at', // i.e. last_update_at
    'updated_by', // varchar (140) -i.e. last_update_by
    'doc_status',
    'parent_id',
    'parent_docfield',
    'parent_doctype',
    'idx', // position or serial_num
    'lft', // left_col or left_side
    'rgt', // right_col or right_side

    '_old_field', // text or json

    // Collaboration and social links
    '_assign',
    '_comments',
    '_liked_by',
    '_user_tags',
    '_seen',

    // Definition
    'dt', //  // varchar (140) - is doctype or datatype?
    'allow_on_submit',
    'permlevel', // int 11
    'precision', // varchar (140)
    'columns', // int 11
    'label', // varchar (140)
    'description', // text
    'default', // text
    'name', // fieldname varchar (140)
    'type', // fieldtype varchar (140)
    'length', // int (11)
    'remember_last_selected_value',
    'is_custom_field',
    'allow_bulk_edit',
    'in_filter',
    'insert_after', // varchar (140)
    'search_index',
    'collapsible',
    'collapsible_depends_on',
    'depends_on', // long_text
    'no_copy',
    'options',
    'print_width', // varchar (140)
    'print_hide',
    'print_hide_if_no_value',
    'report_hide',
    'in_list_view',
    'in_global_search',
    'in_standard_filter',
    'required',
    'unique',
    'read_only',
    'bold_highlight',
    'ignore_xss_filter',
    'ignore_user_permissions',
    'width', // varchar (140)
    'hidden'
];
