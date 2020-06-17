<?php
namespace App\Store\Mysql;

use App\Store\StoreContract;

class MysqlDriver implements StoreContract
{
    /**
     * @var \PDO
     */
    protected $connection;
    protected $options;
    protected $table;

    public function __construct($options)
    {
        try {
            $this->verifyOptions($options);
        } catch (\Exception $e) {
            throw new \PDOException('数据库配置错误: '  . $e->getMessage());
        }
        $host = $options['host'];
        $port = isset($options['port']) ? $options['port'] : 3306;
        $dbname = $options['dbname'];
        $charset = isset($options['charset']) ? $options['charset'] : 'utf8';
        $dsn = sprintf("mysql:host=%s;port=%s;dbname=%s;charset=%s", $host, $port, $dbname, $charset);
        $user = $options['user'];
        $password = $options['password'];
        $this->options = compact('dsn', 'user', 'password');
    }

    public function newConnection()
    {
        $this->connection = new \PDO($this->options['dsn'], $this->options['user'], $this->options['password']);
        return $this;
    }

    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * 通过主键查询指定记录
     * @param $id
     * @return mixed
     */
    public function select($id)
    {
        $sql = sprintf('select * from %s where id = :id', $this->table);
        return $this->statement($sql, ['id' => $id])->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * 通过指定条件查询记录（目前支持=条件）
     * @param $conditions
     */
    public function selectByWhere($conditions)
    {
        if (empty($conditions)) {
            return $this->selectAll();
        }
        $wheres = [];
        foreach ($conditions as $key => $value) {
            $wheres[]  = $key . ' = :' . $key;
        }
        $where = implode(' and ', $wheres);
        $sql = sprintf('select * from %s where %s', $this->table, $where);
        return $this->statement($sql, $conditions)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectAll()
    {
        $sql = sprintf('select * from %s', $this->table);
        return $this->statement($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $sql = $this->buildSql('insert into %s %s vlaues %s', $data);
        $this->statement($sql, $data);
        return $this->connection->lastInsertId();
    }

    public function update($data)
    {
        $sql = $this->buildSql('update %s set %s where %s', $data);
        return $this->statement($sql, $data)->rowCount();
    }

    public function delete($id)
    {
        $sql = sprintf('delete from %s where id = :id', $this->table);
        return $this->statement($sql, ['id' => $id])->rowCount();
    }

    protected function verifyOptions($options = [])
    {
        if (empty($options['host'])) {
            throw new \Exception('数据库主机不能为空');
        }
        if (empty($options['dbname'])) {
            throw new \Exception('数据库名称不能为空');
        }
        if (empty($options['user'])) {
            throw new \Exception('数据库用户名不能为空');
        }
        if (empty($options['password'])) {
            throw new \Exception('数据库密码不能为空');
        }
    }

    /**
     * 设置预处理语句
     * @param $sql
     * @param array $bindings
     * @return \PDOStatement
     */
    protected function statement($sql, $bindings = [])
    {
        $statement = $this->connection->prepare($sql);
        $this->bindValues($statement, $bindings);
        $statement->execute();
        return $statement;
    }

    /**
     * 绑定值到预处理语句
     * @param \PDOStatement $statement
     * @param $bindings
     * @return void
     */
    protected function bindValues($statement, $bindings = [])
    {
        foreach ($bindings as $key => $value) {
            $statement->bindValue(is_string($key) ? $key : $key + 1, $value,
                is_int($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
        }
    }

    protected function buildInertSql($sql, $data)
    {
        if ($this->table) {
            throw new \Exception('数据表尚未设置');
        }
        $columns = [];
        $placeholders = [];
        foreach ($data as $key => $value)
        {
            $columns[] = $key;
            $placeholders = ':' . $key;
        }
        return sprintf($sql, $this->table, $columns, $placeholders);
    }

    protected function buildUpdateSql($sql, $data)
    {
        if ($this->table) {
            throw new \Exception('数据表尚未设置');
        }
        if (empty($data['id'])) {
            throw new \Exception('请指定要更新的 ID');
        }
        $placeholders = [];
        foreach ($data as $key => $value)
        {
            if ($key == 'id') {
                continue;
            }
            $placeholders = $key . ' = :' . $key;
        }
        $condition = 'id = :id';
        return sprintf($sql, $this->table, $placeholders, $condition);
    }
}
