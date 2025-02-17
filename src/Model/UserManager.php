<?php


namespace App\Model;

class UserManager extends AbstractManager
{
    const TABLE = 'user';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function insert(array $user): int
    {
        $statement = $this->pdo->prepare("INSERT INTO $this->table
                                                    VALUES (null, :name, :monster_id, :movie_id)");
        $statement -> bindValue('name', $user['name'], \PDO::PARAM_STR);
        $statement -> bindValue('monster_id', $user['monster_id'], \PDO::PARAM_INT);
        $statement -> bindValue('movie_id', $user['movie_id'], \PDO::PARAM_INT);

        if ($statement->execute()) {
            return(int)$this->pdo->lastInsertId();
        }
    }

    public function selectLastTwo()
    {
        return $this->pdo->query("SELECT * FROM $this->table ORDER BY id DESC LIMIT 2")->fetchAll();
    }
}
