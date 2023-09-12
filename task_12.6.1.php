<?php
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];

function getFullnameFromParts($x) {
    return $x[0] . ' ' . $x[1] . ' ' . $x[2];
}

function getPartsFromFullname($x) {
    return explode(' ', $x);
}

function getShortName($x) {
    $parts = getPartsFromFullname($x);
    $surname = mb_substr($parts[0], 0, 1);
    return $parts[1] . ' ' . $surname . '.';
}

function getGenderFromName($x) {
    $female = [
        'ва',
        'а',
        'вна'
    ];
    
    $male = [
        'в',
        'й',
        'н',
        'ич'
    ];

    $parts = getPartsFromFullname($x);
    $count = 0;

    // Проверка на девочку

    if (str_ends_with($parts[0], $female[0]) === true){ 
        $count--; 
    }

    if (str_ends_with($parts[1], $female[1]) === true){ 
        $count--; 
    }

    if (str_ends_with($parts[2], $female[2]) === true){ 
        $count--; 
    }

    // Проверка на мальчика

    if (str_ends_with($parts[0], $male[0]) === true){ 
        $count++; 
    }

    if (str_ends_with($parts[1], $male[1]) === true){ 
        $count++; 
    }

    if (str_ends_with($parts[1], $male[2]) === true){ 
        $count++; 
    }

    if (str_ends_with($parts[2], $male[3]) === true){ 
        $count++; 
    }


    // Возвращаем пол
    $count = $count <=> 0;
    
    if ($count > 0) {
        return 'Мужской пол';
    } else if ($count < 0) {
        return 'Женский пол';
    } else {
        return 'Неопределенный пол';
    };
}

function getGenderDescription($x) {
    
    $fullName = array_column($x, 'fullname');

    function male($x) {
        $x = getGenderFromName($x);
        if ($x === 'Мужской пол') {
            return true;
        }
    }

    function female($x) {
        $x = getGenderFromName($x);
        if ($x === 'Женский пол') {
            return true;
        }
    }

    function undefined($x) {
        $x = getGenderFromName($x);
        if ($x === 'Неопределенный пол') {
            return true;
        }
    }

    $male = array_filter($fullName, 'male');
    $female = array_filter($fullName, 'female');
    $undefined = array_filter($fullName, 'undefined');

    $percentageMale = (count($fullName) !== 0 ? (count($male) / count($fullName)) : 0) * 100;
    $percentageFemale = (count($fullName) !== 0 ? (count($female) / count($fullName)) : 0) * 100;
    $percentageUndefined = (count($fullName) !== 0 ? (count($undefined) / count($fullName)) : 0) * 100;

    echo 'Гендерный состав аудитории:';
    echo '<br>';
    echo'---------------------------';
    echo '<br>';
    echo 'Мужчины -' . round($percentageMale, 1) . '%';
    echo '<br>';
    echo 'Женщины -' . round($percentageFemale, 1) . '%';
    echo '<br>';
    echo 'Не удалось определить -' . round($percentageUndefined, 1) . '%';
}

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

/* // Проверка
getPerfectPartner('ИваНоВ', 'ИВан', 'ИВАНовиЧ', $example_persons_array);
echo '<br>';
getGenderDescription($example_persons_array); */