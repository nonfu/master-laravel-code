<?php
// 设置连接属性
// $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=test;charset=utf8mb4';
// $user = 'root';
// $pass = 'root';

/*
try {
    // 建立连接
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_PERSISTENT => true
    ]);
    // 执行 SQL 查询
    $sql = $pdo->quote('SELECT * FROM `post` ORDER BY `id` DESC');
    $res = $pdo->query($sql);
    // 打印查询结果
    echo '<pre>';
    foreach ($res as $row) {
        print_r($row);
    }
} catch (PDOException $exception) {
    // 如果数据库操作出现异常，则捕获并打印
    printf("Error: %s\n", $exception->getMessage());
} finally {
    // 释放 PDO 连接实例
    $pdo = null;
}
*/

class Post
{
    public $id;
    public $title;
    public $content;
    public $created_at;

    /**
     * @var PDO
     */
    protected $pdo;

    public function __construct(PDO $pdo = null)
    {
        if ($pdo != null) {
            $this->pdo = $pdo;
        }
    }

    public function insert($title, $content)
    {
        $sql = 'INSERT INTO `post` (title, content, created_at) VALUES (:title, :content, :created_at)';
        try {
            // 准备预处理语句
            $stmt = $this->pdo->prepare($sql);
            // 获取当前时间对应的格式化字符串：2020-05-28 13:00:00
            $datetime = date('Y-m-d H:i:s', time());
            // 绑定参数值
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $datetime, PDO::PARAM_STR);
            // 执行语句
            $stmt->execute();
            return $this->pdo->lastInsertId();  // 返回插入记录对应ID
        } catch (PDOException $e) {
            printf("数据库插入失败: %s\n", $e->getMessage());
        }
    }

    public function batchInsert(array $items)
    {
        $sql = 'INSERT INTO `post` (title, content, created_at) VALUES (:title, :content, :created_at)';
        try {
            // 开启事务
            $this->pdo->beginTransaction();
            // 准备预处理语句
            $stmt = $this->pdo->prepare($sql);
            foreach ($items as $item) {
                // 绑定参数值
                $datetime = date('Y-m-d H:i:s', time());
                $stmt->bindParam(':title', $item['title'], PDO::PARAM_STR);
                $stmt->bindParam(':content', $item['content'], PDO::PARAM_STR);
                $stmt->bindParam(':created_at', $datetime, PDO::PARAM_STR);
                // 执行语句
                $stmt->execute();
            }
            $this->pdo->commit(); // 提交事务
            return $stmt->rowCount();  // 返回受影响的行数
        } catch (PDOException $e) {
            $this->pdo->rollBack(); // 回滚事务
            printf("数据库批量插入失败: %s\n", $e->getMessage());
        }
    }

    public function select($id)
    {
        $sql = 'SELECT * FROM `post` WHERE id = ?';
        try {
            // 准备预处理语句
            $stmt = $this->pdo->prepare($sql);
            // 绑定参数值
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            // 执行语句
            $stmt->execute();
            return $stmt->fetchObject(self::class);  // 以对象方式返回结果集
        } catch (PDOException $e) {
            printf("数据库查询失败: %s\n", $e->getMessage());
        }
    }

    public function selectAll()
    {
        $sql = 'SELECT * FROM `post` ORDER BY id DESC';
        try {
            // 准备预处理语句
            $stmt = $this->pdo->prepare($sql);
            // 执行语句
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);  // 返回所有结果集
        } catch (PDOException $e) {
            printf("数据库查询失败: %s\n", $e->getMessage());
        }
    }

    public function update($id)
    {
        $sql = 'UPDATE `post` SET created_at = :created_at WHERE id = :id';
        try {
            // 准备预处理语句
            $stmt = $this->pdo->prepare($sql);
            $datetime = date('Y-m-d H:i:s', time());
            // 绑定参数值
            $stmt->bindParam(':created_at', $datetime, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            // 执行语句
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            printf("数据库更新失败: %s\n", $e->getMessage());
        }
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `post` WHERE id = ?';
        try {
            // 准备预处理语句
            $stmt = $this->pdo->prepare($sql);
            // 绑定参数值
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            // 执行语句
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            printf("数据库删除失败: %s\n", $e->getMessage());
        }
    }
}

// 初始化 PDO 连接实例
$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=test;charset=utf8mb4';
$user = 'root';
$pass = 'root';
try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    printf("数据库连接失败: %s\n", $e->getMessage());
}

// 测试代码
$post = new Post($pdo);
// insert
/*$title = '这是一篇测试文章🐶';
$content = '测试内容: 今天天气不错☀️';
$id = $post->insert($title, $content);
echo '文章插入成功: ' . $id . '<br>';
// select
$item = $post->select($id);
echo '<pre>';
print_r($item);
// update
$affected = $post->update($id);
echo '受影响的行数: ' . $affected . '<br>';
// delete
$affected = $post->delete($id);
echo '受影响的行数: ' . $affected . '<br>';*/


$items = [
    [
        'title' => '这是一篇测试文章111',
        'content' => '测试内容'
    ],
    [
        'title' => '这是一篇测试文章222',
        'content' => '测试内容'
    ],
    [
        'title' => '这是一篇测试文章333',
        'content' => '测试内容'
    ],
];
$post->batchInsert($items);

// selectAll
$items = $post->selectAll();
print_r($items);











