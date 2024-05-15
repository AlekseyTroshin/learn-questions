<?php


namespace app\models;

use app\dto\Card;
use core\Model;

class MainModel extends Model
{

    public function getCardsDefault(): array
    {
        return self::$db->queryAll("
            SELECT *
            FROM `cards`
            WHERE `user_id` IN (
              SELECT `id`
                FROM `users`
                WHERE `role` = ?
            );",
            ['admin'], Card::class);
    }

}
