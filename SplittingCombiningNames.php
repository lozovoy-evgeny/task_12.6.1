<?php
function getFullnameFromParts($x) {
    return $x[0] . ' ' . $x[1] . ' ' . $x[2];
}

function getPartsFromFullname($x) {
    return explode(' ', $x);
}

// для проверки вывод рандомных данных из массива на страницу

$rand = rand(0, count($example_persons_array)-1);

echo print_r($parts = getPartsFromFullname($example_persons_array[$rand]['fullname']));
echo '<br>';
echo $full = getFullnameFromParts($parts);
