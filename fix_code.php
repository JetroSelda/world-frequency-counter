<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    //function that calculates the modulus of the number.
    function modulusNumber(int $number):int {
        return $number % 2;
        
    }
    //The number given by the user.
    $givenNumber = 41;

    //Storing the result of the function to the $result variable
    $result = modulusNumber($givenNumber);

    //If statement to perform the condition to know if it's even or odd.
    if($result == 0) {
        echo "\nThe number " . $givenNumber . " is even."; 
    }
    else {
        echo "\nThe number " . $givenNumber . " is odd.";
    }

    ?>
</body>
</html>