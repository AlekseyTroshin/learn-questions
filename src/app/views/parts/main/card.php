<?php

/**
 * @var array $card
 */

?>

<div class="col-12 d-flex mt-3 mb-3">
    <div class="row w-75">
        <div class="col-9">
            <div class="col-12">
                <label for="a3" class="form-label">Вопрос</label>
                <p class="form-control" id="a3" rows="2"><?= $card->quest ?></p>
            </div>
            <div class="col-12 mt-3">
                <label for="a4" class="form-label">Описание</label>
                <p class="form-control" id="a4" rows="5"><?= $card->description ?></p>
            </div>
        </div>
        <div class="col-3">
            <button class="btn btn-outline-success mt-32p">проверить</button>
        </div>
    </div>
</div>