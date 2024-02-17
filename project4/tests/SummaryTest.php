<?php

namespace Project4\Arrays;

use Project4\Exceptions;
use PHPUnit\Framework\TestCase;

final class SummaryTest extends TestCase
{
    public function testClassConstructor()
    {
        $summary = new Summary();
        $this->assertInstanceOf(Summary::class, $summary);
    }

    public function testSum()
    {
        $summary = new Summary();
        $this->assertEquals(15, $summary->sum([1, 2, 3, 4, 5]));
    }

    public function testCheck()
    {
        $summary = new Summary();
        $this->expectException(NumericException::class);
        $summary->check([1, 2, 'a', 4, 5]);
    }

    public function testCheckWithNoException()
    {
        $summary = new Summary();
        $this->assertNull($summary->check([1, 2, 3, 4, 5]));
    }

    public function testCheckWithEmptyArray()
    {
        $summary = new Summary();
        $this->assertNull($summary->check([]));
    }
}