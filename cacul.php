<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>ЛБ№4</title>
</head>
<body>
<h1>Калькулятор</h1>
<form action='' method='post' class="calculate">
    <div>
    <input type="text" name="number1" class="numbers" placeholder="Число вводить тут" >
    </div>
    <div >
    <input type="radio" name="operation"  value="plus" checked>
    <label for="plus">+(добавить)</label>
    </div>
    <div>
    <input type="radio" name="operation"  value="minus">
    <label for="minus"> -  (вычесть)</label>
    </div>
    <div>
    <input type="radio" name="operation"  value="multiplication">
    <label for="multiplication">*(умножить)</label>
    </div>
    <div>
    <input type="radio" name="operation"  value="divide">
    <label for="divide">/  (разделить)</label>
    </div>
    <div>
    <input type="text" name="number2" class="numbers" placeholder="Число вводить тут">
    </div>
    <div>
        <br>
    <input class="submit_form" type="submit" name="submit" value="Результат">
    </div>
</form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operation = $_POST['operation'];
    if((!$number1 && $number1 != '0') || (!$number2 && $number2 != '0') ) {
        $error_result = 'Не все поля заполнены';
    }
    else {
        if(!is_numeric($number1) || !is_numeric($number2)){
            $error_result = "Сдесь должны быть числа";
        }
        else
            switch($operation){
                case 'plus':
                    $result = $number1 + $number2;
                    break;
                case 'minus':
                    $result = $number1 - $number2;
                    break;
                case 'multiplication':
                    $result = $number1 * $number2;
                    break;
                case 'divide':
                    if( $number2 == '0')
                        $error_result = "На ноль делить нельзя!";
                    else
                        $result = $number1 / $number2;
                    break;
            }
    }
    if(isset($error_result)){
        echo "<div>Что-то пошло не так: $error_result</div>";
    }
    else {
        echo "<div>Результат: $result</div>";
    }
}
?>