<?php
namespace App\Store;

interface StoreContract
{
    public function newConnection();
    public function table($table);
    public function select($id);
    public function selectByWhere($conditions);
    public function selectAll();
    public function insert($data);
    public function update($data);
    public function delete($id);
}
