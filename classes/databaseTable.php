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
            $query .= ' \'' . $value . '\',';
        }

        $query = rtrim($query, ','); //removing right white spaces or commas
        $query .= ');';

        $stmnt = $this->pdo->prepare($query);
        $stmnt->execute();

        return $stmnt;

    }

    public function processDates($value)
    {
        
       $v = $value->format('Y-m-d');
        return $v;
    }

    public function delete($field, $value)
    {

        $values = [':value' => $value];

        $stmnt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' .
            $field . '=:value');

        $stmnt->execute($values); //it takses array as value

        //   echo $stmnt;
        //   die;

        return $stmnt;

    }

    public function find($field, $value)
    {

        $query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value';

        $values = [':value' => $value];

        $stmnt = $this->pdo->prepare($query);

        $stmnt->execute($values);

        return $stmnt;
    }

    public function update($values)
    {

        $query = 'UPDATE ' . $this->table . ' SET ';

        foreach ($values as $key => $value) {

            if($key == 'joined')
            $value = date ('Y-m-d', strtotime($value));

            if($key!=$this->primaryKey)
            $query .=   $key . ' = '. ' \'' . $value . '\',';    
        }

        $query = rtrim($query, ','); //removing right white spaces or commas
        $query .= ' WHERE ' . $this->primaryKey . ' = ' . $values[$this->primaryKey] . ';';
      
        // echo $query;
        // die;

        $stmnt = $this->pdo->prepare($query);

        $stmnt->execute();

        return $stmnt;
    }

}
