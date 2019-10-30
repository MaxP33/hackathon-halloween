<?php


namespace App\Controller;

use App\Model\MonsterManager;

class MonsterController
{
    public function index()
    {
        $monsterManager = new MonsterManager();
        $monsters = $monsterManager->selectAll();
        return json_encode($monsters['monsters']);
    }
}
