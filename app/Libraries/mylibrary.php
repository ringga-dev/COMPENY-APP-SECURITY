<?php

class Mylibrary
{

    function getKey($bet_id)
    {
        $db = \Config\Database::connect();
        $key = $db->table('user_token')->where(['bet_id' => $bet_id])->get()->getRowArray();
        if ($key) {
            $db->table('user_token')->insert(['exp' => time()]);
            echo $db->table('user_token')->where(['bet_id' => $bet_id])->get()->getRowArray();
        } else {
            $data = [
                'bet_id' => $bet_id,
                'token' => password_hash(bin2hex(openssl_random_pseudo_bytes(64)), PASSWORD_BCRYPT),
                'exp' => time()
            ];
            $db->table('user_token')->insert($data);
            echo $db->table('user_token')->where(['bet_id' => $bet_id])->get()->getRowArray();
        }
    }
}
