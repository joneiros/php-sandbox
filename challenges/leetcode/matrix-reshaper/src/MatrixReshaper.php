<?php

namespace Joneiros;

class MatrixReshaper {
    public function matrixReshape($mat, $r, $c): array {
        $flatMat = array_merge_recursive(...$mat);
        if( count($flatMat) !== $r * $c) {
            return $mat;
        }

        $newMat = [];
        for( $i = 0; $i < count($flatMat); $i += $c) {
            $newMat[] = array_slice($flatMat, $i, $c);
        }

        return $newMat;
    }
}