<?php

$sections = require 'form_sections.php';

foreach ($sections as $section) :
    echo 
        $this->render('@app_main/views/_form/_section', [
            'title'         => $section['label'],
            'content'       => $this->render('_' . $section['id'], [
                                    'form' => $form,
                                    'model' => $model
                                ]),
            'collapsible'   => $section['collapsible'],
            'expanded'      => $section['expanded'],
        ]);
endforeach ?>