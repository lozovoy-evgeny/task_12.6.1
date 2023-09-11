<?php



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

$rand = rand(0, count($example_persons_array)-1);

echo print_r($parts = getPartsFromFullname($example_persons_array[$rand]['fullname']));
echo '<br>';

echo getGenderFromName($example_persons_array[$rand]['fullname']);