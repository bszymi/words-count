<?php

declare(strict_types = 1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use WordsCount\WordsCount;

/**
 * Description of LoadTextTest
 *
 * @author BartoszSzymichowski
 */
class LoadTextTest extends TestCase
{
  /**
   * @expectedException     Exception
   */
    public function testException(): void
    {
      (new WordsCount())->loadText('');
    }

    public function testLoadText(): void
    {
      $this->assertNotEmpty(
        (new WordsCount())->loadText('http://www.google.com'));
    }


}
