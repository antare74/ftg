<?php

if (!function_exists("fibonacci")) {
    function fibonacci($n) {
        $fibonacciSequence = array(0, 1);

        for ($i = 2; $i < $n; $i++) {
            $nextNumber = $fibonacciSequence[$i - 1] + $fibonacciSequence[$i - 2];
            array_push($fibonacciSequence, $nextNumber);
        }
        return $fibonacciSequence;
    }
}

if (!function_exists("make_fibonacci")) {
    function make_fibonacci($n) {
        for ($i = 0; $i <= $n; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo $j;
                if ($j < $i) {
                    echo ", ";
                }
            }
            echo "<br>";
        }
    }
}


if (!function_exists("make_factorial")) {
    function make_factorial($n) {
        if ($n === 0 || $n === 1) {
            return 1;
        } else {
            return $n * make_factorial($n - 1);
        }
    }
}


if (!function_exists("is_palindrome")) {
    function is_palindrome($str) {
        $str = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str)); // Menghapus karakter non-alfanumerik dan mengubah string menjadi lowercase
        $reversedStr = strrev($str); // Membalikkan string

        return $str === $reversedStr;
    }
}

