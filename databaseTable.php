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

    public function insert($values)
    {
        $query = 'INSERT INTO ' . $this->table . '(';

        foreach ($values as $key => $value) {
            $query .= $key . ',';
        }

        $query = rtrim($query, ',');
        $query .= ') VALUES (';

        foreach ($values as $key => $value) {
            $query .= ' \''. $value . '\',';
        }

        $query = rtrim($query, ','); //removing right white spaces or commas
        $query .= ');';

        // echo $query . "XXXXX";
        // die;

        // $values = $this->processDates($values);

        $stmnt = $this->pdo->prepare($query);
        $stmnt->execute();

        
        return $stmnt;

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

    public function delete($field, $value){

        $values = [':value' => $value];

        $stmnt = $this->pdo->prepare('DELETE FROM '. $this->table . ' WHERE ' . 
      $field . '=:value');

      $stmnt->execute($values);

    //   echo $stmnt;
    //   die;

      return $stmnt;

    }

}
