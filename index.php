<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

    <input type="number" name="num01" placeholder="Number One">

    <select name="operator">
        <option value="add">+</option>
        <option value="minus">-</option>
        <option value="times">*</option>
        <option value="divide">/</option>
    </select>
    
    <input type="number" name="num02" placeholder="Number Two">

    <button>Calculate</button>

    </form>

    <?php
    // Grab data from inputs
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num01 = filter_input(INPUT_POST,"num01", FILTER_SANITIZE_NUMBER_FLOAT);
        $num02 = filter_input(INPUT_POST,"num02", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);

        // Error Handlers
        $errors = false;

        if (empty($num01) || empty($num02)|| empty($operator)) {
            echo "Fill all the fields!!!";
            $errors = true;
        }

        if (!is_numeric($num01) || !is_numeric($num02)){
            echo "Numbers only!!!";
            $errors = true;
        }

        //Calculate the numbers if no errors
        if (!$errors) {
            switch ($operator) {
                case "add":
                    $value = $num01 + $num02;
                    break;
                case "minus":
                    $value = $num01 - $num02;
                    break;
                case "times":
                    $value = $num01 * $num02;
                    break;
                case "divide":
                    $value = $num01 / $num02;
                    break;
                
                default:
                echo "Something went wrong!!!";  
            }
            echo "Result is = " . $value . "!!!";
        }
    }
    ?>

</body>
</html>