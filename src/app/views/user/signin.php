<?php

use core\View;

/**
 * @var View $this
 */

$message = 'Успешно !';

?>


<main class="container h-100">
    <div class="row d-flex align-content-center h-100">
        <div class="col-12">
            <?php
            if (empty($_SESSION['user'])) {
                $this->getPart('parts/user/signin');
            } else {
                $this->getPart('messages/access', compact('message'));
            }
            ?>
        </div>
    </div>
</main>
