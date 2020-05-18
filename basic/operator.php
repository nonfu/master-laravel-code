<?php

# 算术运算符
$a = 32;
$b = 8;

$n1 = $a + $b;
$n2 = $a - $b;
$n3 = $a * $b;
$n4 = $a / $b;
$n5 = $a % $b;

printf("%d + %d = %d\n", $a, $b, $n1);
printf("%d - %d = %d\n", $a, $b, $n2);
printf("%d x %d = %d\n", $a, $b, $n3);
printf("%d / %d = %d\n", $a, $b, $n4);
printf("%d %% %d = %d\n", $a, $b, $n5);

$a += $b;  // 等价于 $a = $a + $b;
printf("%d\n", $a);
$a -= $b;  // 等价于 $a = $a - $b;
printf("%d\n", $a);
$a *= $b;  // 等价于 $a = $a * $b;
printf("%d\n", $a);
$a /= $b;  // 等价于 $a = $a / $b;
printf("%d\n", $a);
$a %= $b;  // 等价于 $a = $a % $b;
printf("%d\n", $a);

$a = 32;
$a++;  // 等价于 $a += 1;
$b--;  // 等价于 $b -= 1;
printf("a, b = %d, %d\n", $a, $b);

// ++/--位于变量前后的区别
$a = 32;
$b = 8;
$n6 = $a++;
$n7 = $b--;
printf("a, b, n6, n7 = %d, %d, %d, %d\n", $a, $b, $n6, $n7);

$a = 32;
$b = 8;
$n8 = ++$a;
$n9 = --$b;
printf("a, b, n8, n9 = %d, %d, %d, %d\n", $a, $b, $n8, $n9);

# 比较运算符
$a = 32;
$b = 8;
var_dump($a == $b);  // false
var_dump($a != $b);  // true
var_dump($a > $b);   // true

# 严格比较
$c = 32;
$d = 32.0;
var_dump($c == $d);  // true
var_dump($c != $d);  // false
var_dump($c === $d); // false
var_dump($c !== $d); // true
var_dump($a == $c);  // true
var_dump($a === $c); // true

if ($a > $b && $a >= $c) {
    // do something...
}

if ($a > $b || $a >= $c) {
    // do something...
}

if (!($a < $b)) {
    // do something...
}
