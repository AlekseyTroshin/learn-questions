<?php

use core\View;

/**
 * @var View $this
 * @var array $cards
 */
?>

<main class="container">
    <?php $this->getPart('parts/main/cards', compact('cards')); ?>
</main>
