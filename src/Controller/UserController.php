<?php


namespace App\Controller;

use App\Model\UserManager;

class UserController
{
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $json = file_get_contents('php://input');
                $obj = json_decode($json);
                $userManager = new UserManager();
                $user = [
                    'name' => $obj->name,
                    'monster_id' => $obj->monster_id,
                    'movie_id' => $obj->movie_id,
                ];
                $id = $userManager->insert($user);
                header('HTTP/1.1 201 Created');
                return json_encode(['id' => $id]);
            } catch (\Exception $e) {
                /* var_dump should be delete in production */
                var_dump($e->getMessage());
                header('HTTP/1.1 500 Internal Server Error');
            }
        }
        header('HTTP/1.1 405 Method Not Allowed');
    }
}
