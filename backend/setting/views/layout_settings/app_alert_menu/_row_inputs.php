<?php

echo $this->render('@appSetup/views/_menu/_row_inputs', [
        'modelClass' => $modelClass,
        'model' => $model,
        'rowId' => $rowId
    ]) ?>