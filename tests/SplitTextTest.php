<?php

declare(strict_types = 1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use WordsCount\WordsCount;

/**
 * Description of SplitTextTest
 *
 * @author BartoszSzymichowski
 */
class SplitTextTest extends TestCase
{
    public function testSplit(): void
    {
        $this->assertEquals(['test', 'a', 'test'],
            WordsCount::splitString('test a--test')
        );
    }


}
