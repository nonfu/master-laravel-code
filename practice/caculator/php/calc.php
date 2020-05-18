<?php
//读取POST请求参数
$num1 = $_POST['n1'];
$num2 = $_POST['n2'];
$operator = $_POST['op'];

$result = NULL;
switch ($operator) {
    case '+':
        $result = $num1 + $num2;
        break;
    case '-':
        $result = $num1 - $num2;
        break;
    case 'x':
        $result = $num1 * $num2;
        break;
    case '/':
        $result = $num1 / $num2;
        break;
    default:
        break;
}

// 以 JSON 格式返回响应数据
if ($result === NULL) {
    echo json_encode(['error' => '无效的参数，请重试', 'success' => false]);
} else {
    echo json_encode(['result' => $result, 'success' => true]);
}

die();

