<?php

declare(strict_types = 1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use WordsCount\WordsCount;

/**
 * Description of CountWordsTest
 *
 * @author BartoszSzymichowski
 */
class CountWordsTest extends TestCase
{
    public function testCount(): void
    {
        $this->assertEquals(['a' => 1 , 'b' => 2, 'c' => 1],
            (new WordsCount())->countWords('a b b c.')
        );
    }


}
