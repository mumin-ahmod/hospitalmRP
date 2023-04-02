<?php

class DatabaseTable
{

    // public $pdo;
    // public $table;
    // public $primaryKey;

    public function __construct(private PDO $pdo, private string $table, private string $primaryKey)
    {

    }

    public function findAll()
    {

        $stmnt = $this->pdo->prepare('SELECT * FROM ' . $this->table);

        $result = $stmnt->execute();

        return $stmnt;
    }

    private function insert($values)
    {
        $query = 'INSERT INTO ' . $this->table . '(';

        foreach ($values as $key => $value) {
            $query .= $key . ',';
        }

        $query = rtrim($query, ',');
        $query .= ') VALUES (';

        foreach ($values as $key => $value) {
            $query .= ':' . $value . ',';
        }

        $query = rtrim($query, ','); //removing right white spaces or commas
        $query .= ');';

        $values = $this->processDates($values);

        $stmnt = $this->pdo->prepare($query);
        $stmnt->execute($values);

    }

    private function processDates($values)
    {
        foreach ($values as $key => $value) {
            if ($value instanceof DateTime) {
                $values[$key] = $value->format('Y-m-d');
            }
        }
        return $values;
    }

}
