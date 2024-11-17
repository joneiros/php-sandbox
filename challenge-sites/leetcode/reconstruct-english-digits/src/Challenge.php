<?php

namespace Joneiros;
/**
 * Restructure English Digits
 * https://leetcode.com/problems/reconstruct-original-digits-from-english/description/
 * Originally solved in JS, then ported to PHP for language practice
 */
class Challenge {
    public function main(string $chars): string {
        $charlist = mb_str_split($chars);
        $frequencyMap = [
            "a" => 0,
            "b" => 0,
            "c" => 0,
            "d" => 0,
            "e" => 0,
            "f" => 0,
            "g" => 0,
            "h" => 0,
            "i" => 0,
            "j" => 0,
            "k" => 0,
            "l" => 0,
            "m" => 0,
            "n" => 0,
            "o" => 0,
            "p" => 0,
            "q" => 0,
            "r" => 0,
            "s" => 0,
            "t" => 0,
            "u" => 0,
            "v" => 0,
            "w" => 0,
            "x" => 0,
            "y" => 0,
            "z" => 0,
        ];

        foreach( $charlist as $char) {
            $frequencyMap[$char]++;
        }

        $checkOrder = [
            ["z", "o", 0],
            ["w", "to", 2],
            ["u", "o", 4],
            ["x", "si", 6],
            ["g", "it", 8],
            ["s", "v", 7],
            ["v", "i", 5],
            ["o", "", 1],
            ["t", "", 3],
            ["i", "", 9],
        ];

        $digits = [];

        foreach($checkOrder as $toCheck) {
            $currentUniqueChar = $toCheck[0];
            $currentUniqueLetterCount = $frequencyMap[$currentUniqueChar];
            for($j=0; $j < $currentUniqueLetterCount; $j++) {
                $digits[] = $toCheck[2];

                foreach(mb_str_split($toCheck[1]) as $cutChars) {
                    $frequencyMap[$cutChars]--;
                }
            }
        }
        sort($digits);
        return implode("", $digits);
    }
}