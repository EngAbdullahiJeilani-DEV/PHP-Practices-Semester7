<?php

$num1 = 8;
$num2 = 12;

for ($lcm = 1; ; $lcm++) {
    if ($lcm % $num1 == 0 && $lcm % $num2 == 0) {
        break;
    }
}

echo "LCM of $num1 and $num2 = $lcm";

?>