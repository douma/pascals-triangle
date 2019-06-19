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

        $triangle = new Triangle();
        $output = "          1
         1 1
        1 2 1
       1 3 3 1
      1 4 6 4 1
     1 5 10 10 5 1
    1 6 15 20 15 6 1
   1 7 21 35 35 21 7 1
  1 8 28 56 70 56 28 8 1
 1 9 36 84 126 126 84 36 9 1
1 10 45 120 210 252 210 120 45 10 1
";

        $this->assertEquals($output, $triangle->output(11));
    }
}
