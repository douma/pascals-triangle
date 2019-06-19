<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PascalsTriangle\Triangle;

final class TriangleTest extends TestCase
{
    public function test_numbers_per_row(): void
    {
        $triangle = new Triangle();
        $this->assertEquals(1, $triangle->numbersPerRow(0));
        $this->assertEquals(2, $triangle->numbersPerRow(1));
        $this->assertEquals(3, $triangle->numbersPerRow(2));
    }

    public function test_number_of_leading_spaces(): void
    {
        $triangle = new Triangle();
        $this->assertEquals(4, $triangle->leadingSpaces(5, 0));
        $this->assertEquals(3, $triangle->leadingSpaces(5, 1));
        $this->assertEquals(2, $triangle->leadingSpaces(5, 2));
    }

    public function test_calculate_result()
    {
        $triangle = new Triangle();
        $this->assertEquals(3, $triangle->calculate(1, [
            [1],
            [1,1],
            [1,2,1],
        ]));
        $this->assertEquals(3, $triangle->calculate(2, [
            [1],
            [1,1],
            [1,2,1],
        ]));
        $this->assertEquals(6, $triangle->calculate(2, [
            [1],
            [1,1],
            [1,2,1],
            [1,3,3,1]
        ]));
        $this->assertEquals(1, $triangle->calculate(4, [
            [1],
            [1,1],
            [1,2,1],
            [1,3,3,1]
        ]));
    }

    public function test_output()
    {
        $triangle = new Triangle();
        $output = "    1
   1 1
  1 2 1
 1 3 3 1
1 4 6 4 1
";

        $this->assertEquals($output, $triangle->output(5));
    }
}
