<?php

use core\View;

/**
 * @var View $this
 * @var array $cards
 */

foreach ($cards as $card) {
    $this->getPart('parts/main/card', compact('card'));
}

