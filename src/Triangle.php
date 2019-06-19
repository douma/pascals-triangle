<?php

namespace PascalsTriangle;

class Triangle
{
    public function numbersPerRow(int $index) : int
    {
        return $index + 1;
    }

    public function leadingSpaces(int $totalRows, int $rowIndex) : int
    {
        return $totalRows - 1 - $rowIndex;
    }

    public function calculate(int $columnIndex, array $data) : int
    {
        if(isset($data[count($data)-1])) {
            $previous = end($data);
            if(isset($previous[$columnIndex - 1]) && isset($previous[$columnIndex])) {
                $startNumber = $previous[$columnIndex - 1];
                $endNumber = $previous[$columnIndex];
                return $startNumber + $endNumber;
            }
        }
        return 1;
    }

    public function output(int $totalRows) : string
    {
        $output = "";
        $data = [];
        $dataLoop = [];
        for($rowIndex=0;$rowIndex<$totalRows;$rowIndex++) {
            $numberOfLeadingSpaces = $this->leadingSpaces($totalRows, $rowIndex);
            $numbersPerRow = $this->numbersPerRow($rowIndex);
            for($z=0;$z<$numberOfLeadingSpaces;$z++) {
                $output .= " ";
            }
            for($columnIndex=0;$columnIndex<$numbersPerRow;$columnIndex++) {
                $calculate = $this->calculate($columnIndex, $data);
                if($columnIndex > 0) {
                    $output .= " ";
                }
                $output .= $calculate;
                $dataLoop[$columnIndex] = $calculate;
            }
            $data[$rowIndex] = $dataLoop;
            $output .= PHP_EOL;
        }
        return $output;
    }
}
