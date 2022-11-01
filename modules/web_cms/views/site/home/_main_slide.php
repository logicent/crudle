<?php

use crudle\app\assets\Splidejs;

Splidejs::register($this);
?>

<section class="splide" aria-label="Splide Basic HTML Example">
<!-- <section class="splide" aria-labelledby="carousel-heading"> -->
    <!-- <h2 id="carousel-heading">Splide Basic HTML Example</h2> -->
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide">Slide 01</li>
            <li class="splide__slide">Slide 02</li>
            <li class="splide__slide">Slide 03</li>
        </ul>
    </div>
</section>
<?php
$this->registerJs(<<<JS
    new Splide('.splide').mount();
JS);