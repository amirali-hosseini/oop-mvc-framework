<?php

class Model extends Database
{

    protected $table = '';
    protected $primary_key = 'id';

    public function all()
    {
        return $this->query("SELECT * FROM $this->table")->get();
    }

    public function find(int $id)
    {
        return $this->query("SELECT * FROM $this->table WHERE `id` = :id")->getFetch(['id' => $id]);
    }

    public function destroy(int $id)
    {
        return $this->query("DELETE FROM $this->table WHERE `id` = :id")->getFetch(['id' => $id]);
    }
}
