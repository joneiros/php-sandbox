#!/usr/bin/env php
<?php

/*** Supplied Question
    Given a string s which represents an expression, evaluate this expression and return its value.

    The integer division should truncate toward zero.

    You may assume that the given expression is always valid.
    All intermediate results will be in the range of [-2^31, 2^31 - 1].

    Note: You are not allowed to use any built-in function which evaluates strings as mathematical expressions,
    such as eval().

    Example 1:

    Input: s = "3+2*2"
    Output: 7
    Example 2:

    Input: s = " 3/2 "
    Output: 1
    Example 3:

    Input: s = " 3+5 / 2 "
    Output: 5


    Constraints:

    1 <= s.length <= 3 * 10^5
    s consists of integers and operators ('+', '-', '*', '/') separated by some number of spaces.
    s represents a valid expression.
    All the integers in the expression are non-negative integers in the range [0, 2^31 - 1].
    The answer is guaranteed to fit in a 32-bit integer.
 */

/*** Solution Thinking
    Question Breakdown
    - "The integer division should truncate toward zero." sounds like division answers should be floored
    - "...separated by some number of spaces" means spaces will be inconsistent,
    and therefore cannot be used as a separator for explode()
    - The constraints don't mention parentheses or exponents, so PEDMAS becomes DMAS
    - The fact that "s represents a valid expression" means we can skip some edge cases,
    such as trailing operators

    Possible Solutions
    - For each non-space character in $s, we want to add it to an expressionArray.
    While going through characters, group consecutive integer characters into one number string,
    ignore spaces, and add operators as strings.
    For each number string, convert it to a proper number.
    While expressionArray has more than one item, loop over the array,
    each time evaluating the highest PEDMAS (DMAS in this case) priority expression. Add the result back into the
    array in the same place from which it was removed.
    The last item in the array will be the integer result. Return it.


 */

function calculate(string $s): int {
    $expressionArray = getExpressionArray($s);
    while(count($expressionArray) > 1) {
        $opIndex = getNextDMASIndex($expressionArray);
        $operator = $expressionArray[$opIndex];
        $leftOperand = $expressionArray[$opIndex - 1];
        $rightOperand = $expressionArray[$opIndex + 1];
        $expressionArray[$opIndex] = evaluateExpression($operator, $leftOperand, $rightOperand);

        //remove operands from array
        unset($expressionArray[$opIndex + 1]);
        unset($expressionArray[$opIndex - 1]);
        //fill gaps in array index keys
        $expressionArray = array_values($expressionArray);
        //echo(implode(",", $expressionArray) . "\n");
    }

    return $expressionArray[0];
}

function getExpressionArray($s): array {
    $inputArray = str_split($s);
    $expressionArray = [];
    $numCharAccumulator = '';

    foreach ($inputArray as $char) {
        if (!is_numeric($char) && $numCharAccumulator !== '') {
            $expressionArray[] = $numCharAccumulator;
            $numCharAccumulator = '';
        }

        if( $char === " ") {
            continue;
        }
        elseif (is_numeric($char)) {
            $numCharAccumulator .= $char;
        }
        else { //operators
            $expressionArray[] = $char;
        }
    }

    if ($numCharAccumulator !== '') {
        $expressionArray[] = $numCharAccumulator;
    }

    for($i = 0; $i < count($expressionArray); $i++) {
        if(is_numeric($expressionArray[$i])) {
            $expressionArray[$i] = (int)$expressionArray[$i];
        }
    }

    //echo(implode(",", $expressionArray) . "\n");

    return $expressionArray;
}

/**
 * DMAS == PEDMAS, but reduced to fit the problem set
 */
function getNextDMASIndex(array $expressionArray): int {
    //indexes
    $div = array_search('/', $expressionArray);
    $mul = array_search('*', $expressionArray);
    $add = array_search('+', $expressionArray);
    $sub = array_search('-', $expressionArray);

    //if we're multiplying AND dividing in the expression, return rightmost index first.
    if($div !== false && $mul !== false) {
        return $div < $mul ? $div : $mul;
    }

    if($div !== false) return $div;
    if($mul !== false) return $mul;

    //if we're adding AND subtracting in the expression, return rightmost index first.
    if($add !== false && $sub !== false) {
        return $add < $sub ? $add : $sub;
    }

    if($add !== false) return $add;
    if($sub !== false) return $sub;
}

function evaluateExpression(string $operator, string $leftOperand, string $rightOperand): int {
    $tmpResult = null;
    switch($operator) {
        case '/':
            $tmpResult = $leftOperand / $rightOperand;
            break;
        case '*':
            $tmpResult = $leftOperand * $rightOperand;
            break;
        case '+':
            $tmpResult = $leftOperand + $rightOperand;
            break;
        default: // -
            $tmpResult = $leftOperand - $rightOperand;
            break;
    }

    return (int)floor($tmpResult);
}

$s = "1 + 1";
$s = "1000 - 4";
$s = "15 * 2 + 1";
$s = "2 + 1  * 15";
// failed test cases

//fixed; was using empty() which was filtering this out. Replaced with $exp !== ''
$s = "0";

/*
Wrong answer: -1
This one intermediately evaluated as 1-2 because it was doing the additon first.
Solution:
Minus and plus have the same PEDMAS weight, so they need to be evaluated left to right.
*/
$s = "1-1+1";

/* Left to right for div/multi */
$s = "1+2*5/3+6/4*2";

/* One case fails due to timeout. It contains 100K expressions,
and locally runs in 6 minutes, 50 seconds.
This one likely requires massive overhaul, which I will attempt in a separate file
to preserve this solution for reference*/


echo(calculate($s) . "\n");