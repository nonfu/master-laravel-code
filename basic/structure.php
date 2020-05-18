<?php

# 初始化成绩等级
define("A", "优秀");
define("B", "良好");
define("C", "合格");
define("D", "不合格");

# 初始化科目编码
define("YUWEN", '1');
define("SHUXUE", '2');
define("JISUANJI", '3');

# 初始化成绩数据
$data = [
    '1' => [
        YUWEN => 88,
        SHUXUE => 99,
        JISUANJI => 96
    ],
    '2' => [
        YUWEN => 77,
        SHUXUE => 58,
        JISUANJI => 63
    ],
    '3' => [
        YUWEN => 93,
        SHUXUE => 85,
        JISUANJI => 72
    ],
];

# 单分支选择
$studentId = '2';
$score = $data[$studentId][YUWEN];
/*if ($score >= 90) {
    printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, A);
} else if ($score >= 80 && $score < 90) {
    printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, B);
} else if ($score >= 60 && $score < 80) {
    printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, C);
} else if ($score < 60) {
    printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, D);
} else {
    printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, "其他等级");
}*/
switch ($score) {
    case $score >= 90:
        $level = A;
        break;
    case $score >= 80 && $score < 90:
        $level = B;
        break;
    case $score >= 60 && $score < 80:
        $level = C;
        break;
    case $score < 60:
        $level = D;
        break;
    default:
        $level = "其他等级";
        break;
}
printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, $level);

$total = count($data);
$i = 1;
/*while ($i <= $total) {
    echo "第 $i 个学生的成绩信息：\n";
    print_r($data[$i]);
    $i++;
}*/

/*
do {
    echo "第 $i 个学生的成绩信息：\n";
    print_r($data[$i]);
    $i++;
} while($i <= $total);
*/

for ($i = 1; $i <= $total; $i++) {
    echo "第 $i 个学生的成绩信息：\n";
    print_r($data[$i]);
}

foreach ($data as $id => $score) {
    if ($id == 1) {
        continue;
    }
    echo "第 {$id} 个学生的成绩信息：\n";
    print_r($score);
    if ($id == 2) {
        break;
    }
}



