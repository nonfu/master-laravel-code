<?php
namespace App\Store\Arr;

use App\Store\StoreContract;

class ArrayDriver implements StoreContract
{
    protected $connection = [];
    protected $table;

    public function newConnection()
    {
        $this->connection = [
            'albums' => require_once __DIR__ . DIRECTORY_SEPARATOR . 'albums.php',
            'posts'  => require_once __DIR__ . DIRECTORY_SEPARATOR . 'posts.php',
        ];
        return $this;
    }

    public function table($table)
    {
        if (empty($this->connection[$table])) {
            throw new \Exception(sprintf('指定数据表 %s 不存在', $table));
        }
        $this->table = $table;
        return $this;
    }

    public function select($id)
    {
        if (empty($this->table)) {
            throw new \Exception('请指定要查询的数据表');
        }
        if (empty($this->connection[$this->table][$id])) {
            throw new \Exception(sprintf('在 %s 中找不到 id 为 %d 的数据', $this->table, $id));
        }
        return $this->connection[$this->table][$id];
    }

    public function selectByWhere($conditions)
    {
        if (empty($this->table)) {
            throw new \Exception('请指定要查询的数据表');
        }
        $result = array_filter($this->connection[$this->table], function ($item) use ($conditions) {
            $filtered = true;
            foreach ($conditions as $column => $condition) {
                if ($item[$column] == $condition) {
                    continue;
                } else {
                    $filtered = false;
                    break;
                }
            }
            if ($filtered) {
                return $item;
            }
        });
        return $result;
    }

    public function selectAll()
    {
        if (empty($this->table)) {
            throw new \Exception('请指定要查询的数据表');
        }
        return $this->connection[$this->table];
    }

    public function insert($data)
    {
        if (empty($this->table)) {
            throw new \Exception('请指定要查询的数据表');
        }
        $lastInsertId = count($this->connection[$this->table]) + 1;
        $this->connection[$this->table][$lastInsertId] = $data;
        return $lastInsertId;
    }

    public function update($data)
    {
        if (empty($this->table)) {
            throw new \Exception('请指定要查询的数据表');
        }
        if (empty($data['id'])) {
            throw new \Exception('请指定要更新的记录对应ID');
        }
        $this->connection[$this->table][$data['id']] = $data;
        return true;
    }

    public function delete($id)
    {
        if (empty($this->table)) {
            throw new \Exception('请指定要查询的数据表');
        }
        unset($this->connection[$this->table][$id]);
        return true;
    }
}
