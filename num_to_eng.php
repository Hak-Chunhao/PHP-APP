<?php

/**
 * Convert a numeric value to its English word representation.
 *
 * This function takes a numeric value as input and returns its English word representation.
 *
 * @param mixed $number The numeric value to convert to words.
 * @return string The English word representation of the input number.
 */
function numberToWords($number)
{
    return getCovertResult($number);
}

/**
 * Check if a number is greater than or equal to 10000.
 *
 * This function checks if the provided number is greater than or equal to 10000.
 *
 * @param int $number The number to check.
 * @return bool Returns true if the number is greater than or equal to 10000, otherwise false.
 */
function isMoreThanThousand($number)
{
    return $number >= 10000;
}

/** 
 * Validate the input number.
 *
 * This function validates the input number to ensure it meets certain criteria:
 * - It must be numeric.
 * - It must not be less than 0.
 * - It must be an integer.
 * - It must be between 0 and 9999.
 *
 * @param mixed $number The input number to validate.
 * @return int The validated integer value of the input number.
 * @throws RuntimeException If the input number does not meet the validation criteria.
 */
function validateInput($number)
{
    if (!is_numeric($number)) {
        throw new RuntimeException("Argument must be in numeric");
    } else {
        if (strcmp($number, "0") < 0) {
            throw new RuntimeException("Argument should not less than 0");
        }

        if (strpos($number, '.') !== false) {
            $number = (float)$number;
        } else {
            $number = intval($number);
        }

        if (!is_int($number)) {
            throw new RuntimeException("Argument must be an integer");
        }

        if (isMoreThanThousand($number)) {
            throw new RuntimeException("Error: Argument should be an integer between 0 and 9999.");
        }
    }
    return $number;
}

/** 
 * Get the English word representation of a number.
 *
 * This function returns the English word representation of the provided number.
 *
 * @param int $number The number to convert to words.
 * @return string The English word representation of the input number.
 * @throws RuntimeException If an error occurs during the conversion process.
 */
function getCovertResult($number)
{
    $ones = array(
        0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
        5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine'
    );
    $teens = array(
        10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen',
        14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen',
        18 => 'eighteen', 19 => 'nineteen'
    );
    $tens = array(
        20 => 'twenty', 30 => 'thirty', 40 => 'forty', 50 => 'fifty',
        60 => 'sixty', 70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
    );

    $number = validateInput($number);

    if ($number < 10) {
        return $ones[$number];
    } elseif ($number < 20) {
        return $teens[$number];
    } elseif ($number < 100) {
        return $tens[$number - $number % 10] . '-' . $ones[$number % 10];
    } elseif ($number < 1000) {
        $hundredString = ($number % 100 !== 0) ? ' and ' . numberToWords($number % 100) : '';
        $hundredSuffix = (floor($number / 100) > 1) ? ' hundreds' : ' hundred';
        return $ones[($number / 100)] . $hundredSuffix . (($number % 100 !== 0) ? $hundredString : '');
    } else {
        $base = pow(1000, floor(log($number, 1000)));
        $thousandsString = ($number % $base !== 0) ? ', ' . numberToWords($number % $base) : '';
        $thousandsSuffix = (floor($number / $base) > 1) ? ' thousands' : ' thousand';
        return numberToWords(floor($number / $base)) . $thousandsSuffix . $thousandsString;
    }
}

// Command line usage and execute
try {
    if ($argc != 2) {
        echo "Usage: php num_to_eng.php [number]";
    } else {
        $number = $argv[1];
        echo numberToWords($number);
    }
} catch (RuntimeException $e) {
    echo $e->getMessage();
} finally {
    echo PHP_EOL . "end program";
}
