<?php

$sections = require 'form_sections.php';

foreach ($sections as $section) :
    if (isset($section['hidden'])) :
        continue;
    endif;
    // if (!file_exists('_' . $section['id'] . '.php')) :
    //     continue;
    // endif;
    echo 
        $this->render('@appMain/views/_form/_section', [
            'title'         => $section['label'],
            'content'       => $this->render('_' . $section['id'], [
                                    'form' => $form,
                                    'model' => $model
                                ]),
            'collapsible'   => $section['collapsible'],
            'expanded'      => $section['expanded'],
        ]);
endforeach ?>