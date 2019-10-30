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

    public function show($id)
    {
        $monsterManager = new MonsterManager();
        $monster = $monsterManager->selectOneById($id);
        return json_encode($monster['monster']);
    }
}
