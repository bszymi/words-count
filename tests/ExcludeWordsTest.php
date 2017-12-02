<?php

declare(strict_types = 1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use WordsCount\WordsCount;

/**
 * Description of ExcludeWordsTest
 *
 * @author BartoszSzymichowski
 */
class ExcludeWordsTest extends TestCase
{
    public function testExclude(): void
    {
        $this->assertTrue(
          WordsCount::excludeWords('a', ['a'])
        );

        $this->assertTrue(
          WordsCount::excludeWords('', ['a'])
        );

        $this->assertFalse(
          WordsCount::excludeWords('other', ['a'])
        );

    }


}
