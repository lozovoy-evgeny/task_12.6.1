<?php
function getShortName($x) {
    $parts = getPartsFromFullname($x);
    $surname = mb_substr($parts[0], 0, 1);
    return $parts[1] . ' ' . $surname . '.';
}

// Проверка работы
$rand = rand(0, count($example_persons_array)-1);
$full = $example_persons_array[$rand]['fullname'];
echo getShortName($full);

