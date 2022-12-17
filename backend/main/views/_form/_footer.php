<?php

echo $this->render('@appModules/crud/views/comments/index', ['model' => $model]);

// if ( $this->context->loadModal ) : 
//     $this->registerJs( $this->render('_modal_submit.js') );
// endif;
