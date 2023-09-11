<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include './style.css'; ?></style>
    <title>Document</title>
</head>
<body>
    <?php include 'example_persons_array.php'; ?>
    <div>
        <h1>Разбиение и объединение ФИО</h1>
        <?php include 'splittingCombiningNames.php'; ?>
        
    </div>
    <div>
        <h1> Сокращение ФИО </h1>
        <?php include 'abbreviation.php'; ?>
    </div>
    <div>
        <h1> Функция определения пола по ФИО </h1>
        <?php include 'genderFromName.php'; ?>
    </div>
    <div>
        <h1> Определение возрастно-полового состава </h1>
        <?php include 'genderDescription.php'; ?>
    </div>
    <div>
        <h1> Идеальный подбор пары </h1>
        <?php include 'perfectPartner.php'; ?>
    </div>
</body>
</html>