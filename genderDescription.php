<?php
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

getGenderDescription($example_persons_array);