<?php
include 'trigonometry.php';

function calculate($expr) {
    $expr = str_replace(' ', '', $expr);

    if (!preg_match('~^[\d+\-*/().]+$~', $expr)) {
        return "Ошибка: недопустимые символы.";
    }

    try {
        $result = evaluate($expr);
        return $result;
    } catch (Exception $e) {
        return "Ошибка: " . $e->getMessage();
    }
}

function toRPN($expr) {
    $precedence = ['+' => 1, '-' => 1, '*' => 2, '/' => 2];
    $output = [];
    $stack = [];

    $tokens = preg_split('/([\+\-\*\/\(\)])/u', $expr, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

    foreach ($tokens as $token) {
        if (is_numeric($token)) {
            $output[] = $token;
        } elseif (in_array($token, array_keys($precedence))) {
            while (!empty($stack) && end($stack) !== '(' &&
                   $precedence[end($stack)] >= $precedence[$token]) {
                $output[] = array_pop($stack);
            }
            $stack[] = $token;
        } elseif ($token === '(') {
            $stack[] = $token;
        } elseif ($token === ')') {
            while (!empty($stack) && end($stack) !== '(') {
                $output[] = array_pop($stack);
            }
            array_pop($stack);
        }
    }

    while (!empty($stack)) {
        $output[] = array_pop($stack);
    }

    return $output;
}

function evaluate($expr) {
    $rpn = toRPN($expr);
    $stack = [];

    foreach ($rpn as $token) {
        if (is_numeric($token)) {
            $stack[] = $token;
        } else {
            $b = array_pop($stack);
            $a = array_pop($stack);

            switch ($token) {
                case '+': $stack[] = $a + $b; break;
                case '-': $stack[] = $a - $b; break;
                case '*': $stack[] = $a * $b; break;
                case '/':
                    if ($b == 0) throw new Exception("деление на ноль");
                    $stack[] = $a / $b;
                    break;
            }
        }
    }

    return count($stack) === 1 ? $stack[0] : "Ошибка вычисления";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['load_file'])) {
        $expression = file_get_contents(__DIR__ . '/trigonometry_example.txt');

        $expression = preg_replace_callback('/(sin|cos|tan|cot|sec|csc)\(([^)]+)\)/i', function($matches) {
            $func = $matches[1];
            $value = eval('return ' . $matches[2] . ';');
            return calculateTrig($func, $value);
        }, $expression);

        $result = eval('return ' . $expression . ';');
        echo $result;
        exit;
    }

    $expr = $_POST['expr'] ?? '';
    $result = calculate($expr);
    echo $result;
}
?>
