<?php

use crudle\app\main\assets\Flatpickr;

Flatpickr::register($this);

$isReadonly = $this->context->isReadonly();
?>

<div class="two fields">
    <div class="eight wide field">
        <?= $form->field($model, $start_date_attribute)->textInput([
                'id' => 'start_date',
                'class' => 'pikaday', 
                'maxlength' => true, 
                'readonly' => $isReadonly
            ]) ?>
    </div>
    <div class="eight wide field">
        <?= $form->field($model, $end_date_attribute)->textInput([
                'id' => 'end_date',
                'class' => 'pikaday', 
                'maxlength' => true, 
                'readonly' => $isReadonly
            ]) ?>
    </div>
</div>

<?php
$this->registerJs(<<<JS
    $('.pikaday').flatpickr({
        // minDate : null,
        // maxDate : null,
        // altInput : true,
        // allowInput : false,
        // clickOpens : true,
        // shorthandCurrentMonth : false,
        // time_24hr : false
        // weekNumbers : false
    })
    // el_startDate = document.getElementById('start_date');
    // if (!el_startDate.hasAttribute('readonly'))
        // var startDate = new Pikaday({ 
        //     field: el_startDate,
        //     // trigger: field,
        //     // bound: true,
        //     // format: '',
        //     // toString: function(date, format) {} ,
        //     // defaultDate: new Date(),
        //     // setDefaultDate: false,
        //     // firstDay: 0: Sun, 1: Mon, etc
        //     // minDate: new Date(),
        //     // maxDate: new Date(),
        //     // disableWeekends: false,
        //     // yearRange: 10, // or [2010, 2030]
        //     // showWeekNumber: false,
        //     // pickWholeWeek: false,
        //     // isRTL: ,
        //     // i18n: {
        //     //     previousMonth : 'Previous Month',
        //     //     nextMonth     : 'Next Month',
        //     //     months        : ['January','February','March','April','May','June','July','August','September','October','November','December'],
        //     //     weekdays      : ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
        //     //     weekdaysShort : ['Sun','Mon','Tue','Wed','Thu','Fri','Sat']
        //     // },
        //     // yearSuffix: '',
        //     // showMonthAfterYear: false,
        //     // showDaysInNextAndPreviousMonths: false,
        //     // enableSelectionDaysInNextAndPreviousMonths: false,
        //     // numberOfMonths: 1,
        //     // mainCalendar: left,
        //     // events: [],
        //     // theme: '',
        //     // blurFieldOnSelect: true,
        //     onSelect: function(val) {
        //         el_endDate.minDate = new Date(val)
        //     }
        //     // onOpen: function() {},
        //     // onClose: function() {},
        //     // onDraw: function() {},
        //     // keyboardInput: true,
        // });

    // el_endDate = document.getElementById('end_date');
    // if (!el_endDate.hasAttribute('readonly'))
        // var endDate = new Pikaday({ 
        //     field: el_endDate, 
        //     minDate: new Date(el_startDate.value), 
        //     onOpen: function() {
        //         this._o.minDate = new Date(document.getElementById('start_date').value);
        //     }
        // });

JS);