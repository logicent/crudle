<?php

echo $this->render('@app_main/views/_form_section/comments', ['model' => $model]);

if ( $this->context->loadModal ) : 
    $this->registerJs( $this->render('_modal_submit.js') );
endif;
