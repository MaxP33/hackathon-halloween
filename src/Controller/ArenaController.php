<?php


namespace App\Controller;

use App\Model\MonsterManager;
use App\Service\MonsterCharacter;
use App\Model\UserManager;

class ArenaController
{
    public function fighter()
    {
        $userManager = new UserManager();
        $users = $userManager->selectLastTwo();
        $monsterManager = new MonsterManager();
        $monster1 = $monsterManager->selectOneById($users[0]['monster_id']);
        $monster2 = $monsterManager->selectOneById($users[1]['monster_id']);

        $monster1Attack = $monster1['monster']['attack'];
        $monster1Defense = $monster1['monster']['defense'];
        $monster1Level = $monster1['monster']['level'];
        $monster1Name = $monster1['monster']['name'];
        $monster2Attack = $monster2['monster']['attack'];
        $monster2Defense = $monster2['monster']['defense'];
        $monster2Level = $monster2['monster']['level'];
        $monster2Name = $monster2['monster']['name'];
        $character1 = new MonsterCharacter($monster1Attack, $monster1Defense, $monster1Level, $monster1Name);
        $character2 = new MonsterCharacter($monster2Attack, $monster2Defense, $monster2Level, $monster2Name);

        if ($character1->getLife() > $character2->getLife()) {
            $result = ($character2->fight($character1));
        } else {
            $result = ($character1->fight($character2));
        }
        if ($character1->isAlive()) {
            $winner['winner_movie_id'] = $users[0]['movie_id'];
        } else {
            $winner['winner_movie_id'] = $users[1]['movie_id'];
        }
        return json_encode([
                'logs' => $result,
                'winner' => $winner,
                ]);
    }
}
