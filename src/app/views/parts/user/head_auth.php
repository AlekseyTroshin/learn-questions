<?php

use app\models\UserModel;

$model = new UserModel();

?>

<?php if ($model->checkAuth()): ?>
    <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="btn btn-outline-info btn-outline-primary mr-2" href="#"><?= $_SESSION['user']['email'] ?></a>
        <a class="btn btn-outline-info btn-outline-secondary" href="/user/logout">logout</a>
    </div>
<?php else: ?>
    <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="btn btn-outline-info btn-outline-secondary mr-2" href="/user/signup">sign up</a>
        <a class="btn btn-outline-info btn-outline-secondary" href="/user/signin">sign in</a>
    </div>
<?php endif; ?>
