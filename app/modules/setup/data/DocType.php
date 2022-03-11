<?php

// file 'DocType.php'

// Naming Series for Master Data
// Numbering Series for Transaction Data

return [
    [
        'id' => 'Customer',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\sales\Customer',
        'url' => 'sales/customer',
        'series' => 'CUST-',
        'serial' => 1,
        'name' => 'Customer',
        'module' => 'selling',
        'column' => 'right',
        'group' => 'master', // Master, Transaction, Setup, Report
        // 'dataImport' => true,
        'show_icon' => true,
        'icon' => 'tag',
        'icon_color' => 'green',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'CustomerGroup',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\sales\CustomerGroup',
        'url' => 'sales/customer-group',
        'series' => 'CGRP-',
        'serial' => 2,
        'name' => 'Customer Group',
        'module' => 'selling',
        'column' => 'right',
        'group' => 'master', // Master, Transaction, Setup, Report
        'show_icon' => false,
        'icon' => 'tag',
        'icon_color' => 'green',
        'icon_img' => '',
        'visible' => false,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'PosInvoice',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\accounts\PosInvoice',
        'url' => 'accounts/pos',
        'series' => 'SINV-',
        'serial' => 1,
        'name' => 'POS',
        'module' => 'accounts',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report        
        'show_icon' => true,
        'icon' => 'credit card outline',
        'icon_color' => 'teal',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'PosProfile',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\accounts\PosProfile',
        'url' => 'accounts/pos-profile',
        'series' => '',
        'serial' => 2,
        'name' => 'POS Profile',
        'module' => 'accounts',
        'column' => 'left',
        'group' => 'setup', // Master, Transaction, Setup, Report        
        'show_icon' => false,
        'icon' => '',
        'icon_color' => '',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'SalesInvoice',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\accounts\SalesInvoice',
        'url' => 'accounts/sales-invoice',
        'series' => 'SINV-',
        'serial' => 1,
        'name' => 'Sales Invoice',
        'module' => 'accounts',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report        
        'show_icon' => true,
        'icon' => 'file alternate outline',
        'icon_color' => 'blue',
        'icon_img' => '',
        'visible' => true,
        'status' => 'beta' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'DeliveryNote',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\stock\DeliveryNote',
        'url' => 'stock/delivery-note',
        'series' => 'DEL-',
        'serial' => 3,
        'name' => 'Delivery Note',
        'module' => 'stock',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report        
        'show_icon' => false,
        'icon' => 'file alternate outline',
        'icon_color' => 'green',
        'icon_img' => '',
        'visible' => true,
        'status' => 'alpha' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'SalesOrder',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\sales\SalesOrder',
        'url' => 'sales/sales-order',
        'series' => 'SO-',
        'serial' => 1,
        'name' => 'Sales Order',
        'module' => 'selling',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report             
        'show_icon' => true,
        'icon' => 'file alternate outline',
        'icon_color' => 'green',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'SalesReturn',  // i.e. neg amount reduces payables
        'alias' => 'Credit Note',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\accounts\SalesReturn',
        'url' => 'accounts/sales-return',
        'series' => 'SRET-',
        'serial' => 2,
        'name' => 'Sales Return',
        'module' => 'accounts',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'file alternate outline',
        'icon_color' => 'blue',
        'icon_img' => '',
        'visible' => false,
        'status' => 'alpha' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'SalesQuote', // Quotation
        'alias' => 'Quotation',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\sales\SalesQuote',
        'url' => 'sales/sales-quote',
        'series' => 'SQ-',
        'serial' => 2,
        'name' => 'Sales Quote',
        'module' => 'selling',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report             
        'show_icon' => true,
        'icon' => 'file alternate outline',
        'icon_color' => 'green',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'Supplier',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\purchase\Supplier',
        'url' => 'purchase/supplier',
        'series' => 'SUPP-',
        'serial' => 1,
        'name' => 'Supplier',
        'module' => 'buying',
        'column' => 'right',
        'group' => 'master', // Master, Transaction, Setup, Report             
        'show_icon' => true,
        'icon' => 'briefcase',
        'icon_color' => 'red',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'PurchaseInvoice',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\purchase\PurchaseInvoice',
        'url' => 'accounts/purchase-invoice',
        'series' => 'PINV-',
        'serial' => 2,
        'name' => 'Purchase Invoice',
        'module' => 'accounts',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report             
        'show_icon' => true,
        'icon' => 'file alternate outline',
        'icon_color' => 'blue',
        'icon_img' => '',
        'visible' => true,
        'status' => 'beta' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'PurchaseReceipt',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\stock\PurchaseReceipt',
        'url' => 'stock/purchase-receipt',
        'series' => 'PRCT-',
        'serial' => 2,
        'name' => 'Purchase Receipt',
        'module' => 'stock',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'file alternate outline',
        'icon_color' => 'red',
        'icon_img' => '',
        'visible' => true,
        'status' => 'alpha' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'PurchaseOrder',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\purchase\PurchaseOrder',
        'url' => 'purchase/purchase-order',
        'series' => 'PO-',
        'serial' => 1,
        'name' => 'Purchase Order',
        'module' => 'buying',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report             
        'show_icon' => true,
        'icon' => 'file alternate outline',
        'icon_color' => 'red',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'PurchaseReturn',    // Debit Note i.e. pos amount reduces receivables
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\accounts\PurchaseReturn',
        'url' => 'accounts/purchase-return',
        'series' => 'PRET-',
        'serial' => 2,
        'name' => 'Purchase Return',
        'module' => 'accounts',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'file alternate outline',
        'icon_color' => 'blue',
        'icon_img' => '',
        'visible' => false,
        'status' => 'alpha' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'SupplierQuotation',
        'alias' => '',
        'type' => 'addon', // core/standard, addon/custom
        'namespace' => '\app\models\purchase\SupplierQuotation',
        'url' => 'purchase/supplier-quotation',
        'series' => 'SPQT-',
        'serial' => 1,
        'name' => 'Supplier Quotation',
        'module' => 'buying',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'file alternate',
        'icon_color' => 'red',
        'icon_img' => '',
        'visible' => false,
        'status' => 'beta' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'Item',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\stock\Item',
        'url' => 'stock/item',
        'series' => 'ITEM-',
        'serial' => 1,
        'name' => 'Item',
        'module' => 'stock',
        'column' => 'left',
        'group' => 'master', // Master, Transaction, Setup, Report             
        'show_icon' => true,
        'icon' => 'cube', // to use newer icons when available e.g. box, dolly
        'icon_color' => 'yellow',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'ItemGroup',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\stock\ItemGroup',
        'url' => 'stock/item-group',
        'series' => 'IGRP-',
        'serial' => 2,
        'name' => 'Item Group',
        'module' => 'stock',
        'column' => 'left',
        'group' => 'master', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'sitemap',
        'icon_color' => 'yellow',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'ItemPrice',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\stock\ItemPrice',
        'url' => 'stock/item-price',
        'series' => 'IPRC-',
        'serial' => 3,
        'name' => 'Item Price',
        'module' => 'stock',
        'group' => 'master', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'clipboard check',
        'icon_color' => 'yellow',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'PriceList',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\stock\PriceList',
        'url' => 'stock/price-list',
        'series' => 'PRCL-',
        'serial' => 4,
        'name' => 'Price List',
        'module' => 'stock',
        'column' => 'left',
        'group' => 'master', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'clipboard list',
        'icon_color' => 'yellow',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'Uom',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\stock\Uom',
        'url' => 'stock/uom',
        'series' => 'IUOM-',
        'serial' => 5,
        'name' => 'Unit of Measure',
        'module' => 'stock',
        'column' => 'right',
        'group' => 'setup', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'pallet',
        'icon_color' => 'yellow',
        'icon_img' => '',
        'visible' => true,
        'status' => 'beta' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'StockEntry',    // Purpose: Material Issue, Material Receipt, Material Transfer, Repack
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\stock\StockEntry',
        'url' => 'stock/stock-entry',
        'series' => 'STE-',
        'serial' => 1,
        'name' => 'Stock Entry',
        'module' => 'stock',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'cube',
        'icon_color' => 'yellow',
        'icon_img' => '',
        'visible' => true,
        'status' => 'alpha' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'Warehouse',    // Purpose: Material Issue, Material Receipt, Material Transfer, Repack
        'alias' => 'Item Location',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\stock\Warehouse',
        'url' => 'stock/warehouse',
        'series' => 'WHS-',
        'serial' => 5,
        'name' => 'Warehouse',
        'module' => 'stock',
        'column' => 'right',
        'group' => 'setup', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'cube',
        'icon_color' => 'yellow',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],    
    [
        'id' => 'StockSettings',    // Purpose: Material Issue, Material Receipt, Material Transfer, Repack
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\stock\StockSettings',
        'url' => 'setup/stock-settings/index',
        'series' => '',
        'serial' => 6,
        'name' => 'Stock Settings',
        'module' => 'stock',
        'column' => 'right',
        'group' => 'setup', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'cube',
        'icon_color' => 'yellow',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    // ['ChartOfAccount' => 'Chart Of Account'],
    // ['JournalEntry' => 'Journal Entry'],
    // ['GLEntry' => 'GL Entry'],
    [
        'id' => 'PaymentRequest',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\accounts\PaymentRequest',
        'url' => 'accounts/payment-request',
        'series' => 'PYRQ-',
        'serial' => 1,
        'name' => 'Payment Request',
        'module' => 'accounts',
        'column' => 'left',
        'group' => 'notification', // Master, Transaction, Setup, Report, Notification
        'show_icon' => false,
        'icon' => 'envelope open outline',
        'icon_color' => 'blue',
        'icon_img' => '',
        'visible' => true,
        'status' => 'alpha' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'PaymentEntry',  // Type: Receive, Pay, Internal Transfer
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\accounts\PaymentEntry',
        'url' => 'accounts/payment-entry',
        'series' => 'PYE-',
        'serial' => 3,
        'name' => 'Payment Entry',
        'module' => 'accounts',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report                 
        'show_icon' => false,
        'icon' => 'money bill alternate outline',
        'icon_color' => 'blue',
        'icon_img' => '',
        'visible' => false,
        'status' => 'alpha' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'User',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\Person',
        'url' => '/user',
        'series' => 'USR-',
        'serial' => 1,
        'name' => 'User',
        'module' => 'setup',
        'column' => 'left',
        'group' => 'master', // Master, Transaction, Setup, Report
        'show_icon' => false,
        'icon' => 'user',
        'icon_color' => 'teal',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'Role',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\setup\Role',
        'url' => '/setup/role/index',
        'series' => '',
        'serial' => 2,
        'name' => 'Role',
        'module' => 'setup',
        'column' => 'left',
        'group' => 'master', // Master, Transaction, Setup, Report
        'show_icon' => false,
        'icon' => '',
        'icon_color' => 'teal',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'EmployeeAttendanceTool',
        'type' => 'core', // core/standard, addon/custom
        'name' => 'Attendance Tool',
        'group' => 'transaction', // Master, Transaction, Setup, Report
        'serial' => 2,
        'url' => 'hr/attendance-tool/index',
        'show_icon' => true,
        'icon' => 'calendar check outline',
        'icon_color' => 'olive',
        'icon_img' => '',        
        'module' => 'hr',
        'visible' => true
    ],
    [
        'id' => 'DataImportTool',
        'type' => 'core', // core/standard, addon/custom
        'name' => 'Data Import Tool',
        'group' => 'setup', // Master, Transaction, Setup, Report        
        'serial' => 1,
        'url' => 'setup/data-tool/index',
        'show_icon' => false,
        'icon' => 'tag',
        'icon_color' => 'green',
        'icon_img' => '',        
        'module' => 'setup',
        'visible' => true
    ],
    [
        'id' => 'Employee',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\hr\Employee',
        'url' => 'hr/employee',
        'series' => 'EMP-',
        'serial' => 1,
        'name' => 'Employee',
        'module' => 'hr',
        'column' => 'left',
        'group' => 'master', // Master, Transaction, Setup, Report                 
        'show_icon' => true,
        'icon' => 'id card outline',
        'icon_color' => 'olive',
        'icon_img' => '',
        'visible' => true,
        'status' => 'alpha' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'EmployeeAttendance',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\hr\EmployeeAttendance',
        'url' => 'hr/employee-attendance',
        'series' => 'ATT-',
        'serial' => 1,
        'name' => 'Employee Attendance',
        'module' => 'hr',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report                 
        'show_icon' => false,
        'icon' => 'calendar alternate outline',
        'icon_color' => 'olive',
        'icon_img' => '',
        'visible' => true,
        'status' => 'alpha' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'LeaveApplication',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\hr\LeaveApplication',
        'url' => 'hr/leave-application',
        'series' => 'LA-',
        'serial' => 5,
        'name' => 'Leave Application',
        'module' => 'hr',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report                 
        'show_icon' => false,
        'icon' => 'calendar alternate outline',
        'icon_color' => 'olive',
        'icon_img' => '',
        'visible' => true,
        'status' => 'alpha' // prod/stable, dev/beta, alpha or TBD
    ],    
    [
        'id' => 'Timesheet',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\hr\Timesheet',
        'url' => 'hr/timesheet',
        'series' => 'TSH-',
        'serial' => 2,
        'name' => 'Timesheet',
        'module' => 'hr',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'clock outline',
        'icon_color' => 'olive',
        'icon_img' => '',
        'visible' => false,
        'status' => 'tbd' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'SalaryComponent',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\hr\SalaryComponent',
        'url' => 'hr/salary-component',
        'series' => '',
        'name' => 'Salary Component',
        'serial' => 4,
        'module' => 'hr',
        'column' => 'right',
        'group' => 'master', // Master, Transaction, Setup, Report                 
        'show_icon' => false,
        'icon' => '',
        'icon_color' => 'olive',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'SalaryStructure',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\hr\SalaryStructure',
        'url' => 'hr/salary-structure',
        'series' => '',
        'name' => 'Salary Structure',
        'serial' => 3,
        'module' => 'hr',
        'column' => 'right',
        'group' => 'master', // Master, Transaction, Setup, Report                 
        'show_icon' => false,
        'icon' => '',
        'icon_color' => 'olive',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'PayrollEntry',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\hr\PayrollEntry',
        'url' => 'hr/payroll-entry',
        'series' => 'PAYR-',
        'serial' => 4,
        'name' => 'Payroll Entry',
        'module' => 'hr',
        'column' => 'right',
        'group' => 'transaction', // Master, Transaction, Setup, Report                 
        'show_icon' => false,
        'icon' => '',
        'icon_color' => 'olive',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'SalarySlip',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\models\hr\SalarySlip',
        'url' => 'hr/salary-slip',
        'series' => 'SLP-',
        'serial' => 3,
        'name' => 'Salary Slip',
        'module' => 'hr',
        'column' => 'right',
        'group' => 'transaction', // Master, Transaction, Setup, Report                 
        'show_icon' => false,
        'icon' => '',
        'icon_color' => 'olive',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    // ['EmployeeLoan' => 'Employee Loan'],
    // ['LoanApplication' => 'Loan Application'],
    // ['LoanType' => 'Loan Type'],

    // -- Recruitment
    // Job Applicant
    // Job Opening
    // Job Offer 

    // -- Leaves and Holiday
    // Leave Application
    // Leave Type
    // Holiday List
    // Leave Allocation
    // Leave Allocation Tool
    // Leave Block List 

    // -- Expense Claims
    // Expense Claim
    // Expense Claim Type 

    // -- Appraisals
    // Appraisal
    // Appraisal Template 
    [
        'id' => 'WorkOrder',
        'alias' => 'Production Order',
        'type' => 'addon', // core/standard, addon/custom
        'namespace' => '\app\models\production\WorkOrder',
        'url' => 'production/work-order',
        'series' => 'WO-',
        'serial' => 1,
        'name' => 'Work Order',
        'module' => 'production',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'file alternate outline',
        'icon_color' => 'orange',
        'icon_img' => '',
        'visible' => false,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'ProductionLine',
        'alias' => '',
        'type' => 'addon', // core/standard, addon/custom
        'namespace' => '\app\models\production\ProductionLine',
        'url' => 'production/production-line',
        'series' => 'PLIN-',
        'serial' => 1,
        'name' => 'Production Line',
        'module' => 'production',
        'column' => 'left',
        'group' => 'master', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'file alternate outline',
        'icon_color' => 'orange',
        'icon_img' => '',
        'visible' => false,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],    
    [
        'id' => 'ProductionStage',
        'alias' => '',
        'type' => 'addon', // core/standard, addon/custom
        'namespace' => '\app\models\production\ProductionStage',
        'url' => 'production/production-stage',
        'series' => 'PSTG-',
        'serial' => 2,
        'name' => 'Production Stage',
        'module' => 'production',
        'column' => 'left',
        'group' => 'master', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'file alternate outline',
        'icon_color' => 'orange',
        'icon_img' => '',
        'visible' => false,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],        
    [
        'id' => 'ProductionBatch',
        'alias' => '',
        'type' => 'addon', // core/standard, addon/custom
        'namespace' => '\app\models\production\ProductionBatch',
        'url' => 'production/production-batch',
        'series' => 'PBAT-',
        'serial' => 2,
        'name' => 'Production Batch',
        'module' => 'production',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report             
        'show_icon' => false,
        'icon' => 'file alternate outline',
        'icon_color' => 'orange',
        'icon_img' => '',
        'visible' => false,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],       
    [
        'id' => 'Vehicle',
        'alias' => '',
        'type' => 'addon', // core/standard, addon/custom
        'namespace' => '\app\models\fleet\Vehicle',
        'url' => 'fleet/vehicle',
        'series' => 'VEH-',
        'serial' => 1,
        'name' => 'Vehicle',
        'module' => 'fleet',
        'column' => 'left',
        'group' => 'master', // Master, Transaction, Setup, Report                 
        'show_icon' => true,
        'icon' => 'truck',
        'icon_color' => 'brown',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'VehicleService',
        'alias' => '',
        'type' => 'addon', // core/standard, addon/custom
        'namespace' => '\app\models\fleet\VehicleService',
        'url' => 'fleet/vehicle-service',
        'series' => 'VHSR-',
        'serial' => 2,
        'name' => 'Vehicle Service',
        'module' => 'fleet',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report                 
        'show_icon' => false,
        'icon' => 'tasks',
        'icon_color' => 'brown',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'VehicleLog',
        'alias' => 'Vehicle Trip',
        'type' => 'addon', // core/standard, addon/custom
        'namespace' => '\app\models\fleet\VehicleLog',
        'url' => 'fleet/vehicle-log',
        'series' => 'VTRP-',
        'serial' => 3,
        'name' => 'Vehicle Log',
        'module' => 'fleet',
        'column' => 'left',
        'group' => 'transaction', // Master, Transaction, Setup, Report                 
        'show_icon' => false,
        'icon' => 'shipping fast',
        'icon_color' => 'brown',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
];
