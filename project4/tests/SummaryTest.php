<?php

namespace Project4\Arrays;

use PHPUnit\Framework\TestCase;

final class SummaryTest extends TestCase
{
    public function testClassConstructor()
    {
        $summary = new Project4\Arrays\Summary();
        $this->assertInstanceOf(Summary::class, $summary);
    }

    public function testSum()
    {
        $summary = new Project4\Arrays\Summary();
        $this->assertEquals(15, $summary->sum([1, 2, 3, 4, 5]));
    }

    public function testCheck()
    {
        $summary = new Project4\Arrays\Summary();
        $this->expectException(NumericException::class);
        $summary->check([1, 2, 'a', 4, 5]);
    }

    public function testCheckWithNoException()
    {
        $summary = new Project4\Arrays\Summary();
        $this->assertNull($summary->check([1, 2, 3, 4, 5]));
    }

    public function testCheckWithEmptyArray()
    {
        $summary = new Project4\Arrays\Summary();
        $this->assertNull($summary->check([]));
    }
}