<?php

namespace Project4\Demo;

class Demonstration
{
    public function __construct()
    {
        $this->values = [1, 2, 3, 4, 5];
        $this->summary = new \Project4\Arrays\Summary();
    }

    public function values()
    {
        return $this->values;
    }

    public function values_as_json()
    {
        return json_encode($this->values);
    }

    public function run()
    {
        $this->summary->check($this->values);
        $result = $this->summary->sum($this->values);
        return $result;
    }
}