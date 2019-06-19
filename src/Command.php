<?php

namespace PascalsTriangle;

class Command
{
    private $triangle;

    public function __construct(Triangle $triangle)
    {
        $this->triangle = $triangle;
    }

    public function run()
    {
        if(!isset($_SERVER['argv'][1])) {
            echo "Please enter a number" . PHP_EOL;
            exit;
        }

        print $this->triangle->output((int) $_SERVER['argv'][1]);
    }
}
