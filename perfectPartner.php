<?php

function getPerfectPartner($surname, $name, $patronymic, $x) {

    $surname = mb_strtolower($surname);
    $name = mb_strtolower($name);
    $patronymic = mb_strtolower($patronymic);

    $fullName = [];
    array_push($fullName, $surname);
    array_push($fullName, $name);
    array_push($fullName, $patronymic);

    $fullName = getFullnameFromParts($fullName);
    $fullName = mb_convert_case($fullName, MB_CASE_TITLE , "UTF-8");

    $fullNameGender = getGenderFromName($fullName);

    $rand = rand(0, count($x)-1);
    $randomName = $x[$rand]['fullname'];

    while ((getGenderFromName($randomName) === $fullNameGender) or (getGenderFromName($randomName) === 'Неопределенный пол')) {
        $rand = rand(0, count($x)-1);
        $randomName = $x[$rand]['fullname'];
    };

    echo getShortName($fullName) . ' + ' . getShortName($randomName) . ' = ';
    echo '<br>';
    echo '♡ Идеально на ' . rand(5000, 10000)/100 . '%' . '♡';


}

// Проверка
getPerfectPartner('ИваНоВ', 'ИВан', 'ИВАНовиЧ', $example_persons_array);
