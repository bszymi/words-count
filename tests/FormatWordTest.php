<?php

declare(strict_types = 1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use WordsCount\WordsCount;

/**
 * Description of FormatWordTest
 *
 * @author BartoszSzymichowski
 */
class FormatWordTest extends TestCase
{
    public function testRemoveChars(): void
    {
        $this->assertEquals('test',
            WordsCount::formatWord('test!')
        );

        $this->assertEquals('test',
            WordsCount::formatWord('test"')
        );

        $this->assertEquals('test',
            WordsCount::formatWord('test,')
        );
    }

    public function testUppercase(): void
    {
        $this->assertEquals('test',
            WordsCount::formatWord('Test')
        );
    }

}
