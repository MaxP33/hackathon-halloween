<?php


namespace App\Service;

class MonsterCharacter
{
    private $attack;

    private $defense;

    private $life;

    private $name;

    public function __construct($attack, $defense, $level, $name)
    {
        $this->name = $name;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->life = (rand(5, 10) * intval($level));
    }

    public function isAlive(): bool
    {
        $result = false;
        if ($this->getLife() > 0) {
            $result = true;
        }
        return $result;
    }

    public function fight(MonsterCharacter $monsterCharacter)
    {
        $logs = [];
        while ($this->isAlive() && $monsterCharacter->getLife() > 0) {
            $monsterCharacter->setLife($monsterCharacter->getLife() - $this->getAttack());
            $logs[] = $this->getName() . ' a attaqué ' . $monsterCharacter->getName() . '. Il reste ' .
                      $monsterCharacter->getLife() . 'pv à ' . $monsterCharacter->getName();

            if ($monsterCharacter->isAlive() && $this->getLife() > 0) {
                $this->setLife($this->getLife() - $monsterCharacter->getAttack());
                $logs[] = $monsterCharacter->getName() . ' a attaqué ' . $this->getName() . '. Il reste ' .
                    $this->getLife() . 'pv à ' . $this->getName();
            }
        }
        if ($this->isAlive()) {
            $logs[] = $monsterCharacter->getName() . ' est mort' ;
        } else {
            $logs[] = $this->getName() . ' est mort';
        }
        return $logs;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param float|int $life
     */
    public function setLife($life): void
    {
        if ($life < 0) {
            $this->life = 0;
        } else {
            $this->life = $life;
        }
    }

    /**
     * @return float|int
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * @param mixed $defense
     */
    public function setDefense($defense): void
    {
        $this->defense = $defense;
    }

    /**
     * @return mixed
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * @param mixed $attack
     */
    public function setAttack($attack): void
    {
        $this->attack = $attack;
    }

    /**
     * @return mixed
     */
    public function getAttack()
    {
        return $this->attack;
    }
}
