<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

// TODO: allow custom placeholder image (default to none)
$imgPlaceholder = Yii::getAlias('@web') . '/img/photo-ph.jpg';
$imgPath = Yii::getAlias('@web/uploads/') . $model->$attribute;
$imgTag = Elements::image( $model->$attribute != '' ? 
            $imgPath : $imgPlaceholder,
            ['class' => 'medium bordered rounded']);

if ( $this->context->action->id == 'read' ) :
    echo $imgTag;
else :
    echo Html::a( $imgTag, ['#'], [
            'id' => 'img_link', 
            'class' => 'ui medium image',
        ]); ?>
    <div class="ui center aligned basic segment">
        <?= Elements::button(Elements::icon('trash'), [
                'id' => 'del_file',
                'class' => 'compact ui mini icon button',
                'data' => [
                    'file-path' => $imgPlaceholder
                ]
            ]) ?>
    </div>
<?php
endif;
$this->registerJs( $this->render('file_upload.js') );
?>
