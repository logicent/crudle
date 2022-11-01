<?php

use crudle\app\assets\Splidejs;

Splidejs::register($this);
?>

<div class="splide" role="group" aria-label="Splide Basic HTML Example">
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide">Slide 01</li>
            <li class="splide__slide">Slide 02</li>
            <li class="splide__slide">Slide 03</li>
        </ul>
    </div>
</div>
<?php
$this->registerJs(<<<JS
    new Splide('.splide').mount();
JS);