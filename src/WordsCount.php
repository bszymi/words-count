<?php

namespace WordsCount;

use \Exception;

class WordsCount
{
    public function run() : void
    {
      try {
        $text = $this->loadText("https://s3-eu-west-1.amazonaws.com/secretsales-dev-test/interview/flatland.txt");
        $wordsArray = $this->countWords($text);
        $this->printWords($wordsArray, 100);

      } catch (Exception $ex) {
        echo $ex->getMessage();
      }

    }

    public function loadText(string $url) : string
    {
      // load text from url
      $text = @file_get_contents($url);
      if ($text === false) {
        throw new Exception("Cannot load the file.", 1);
      }

      return $text;
    }

    public function countWords(string $text) : array
    {
      // explode string
      $splited = WordsCount::splitString($text);

      $wordsArray = [];

      foreach ($splited as $word) {
        // format word
        $word = WordsCount::formatWord($word);

        if (WordsCount::excludeWords($word)) continue;

        if (!array_key_exists($word, $wordsArray)) {
          $wordsArray[$word] = 0;
        }
        $wordsArray[$word]++;
      }

      return $wordsArray;
    }

    public function printWords(array $wordsArray, int $limit) : void
    {
      // sort array by counter in reverse order
      arsort($wordsArray);

      // take first 100 words
      $wordsArray = array_slice($wordsArray, 0, $limit);

      foreach($wordsArray as $word => $count) {
        echo $word . ',' . $count . "\n";
      }

    }

    public static function splitString(string $text) : array
    {
      return preg_split("/\s|--/", $text);
    }

    public static function formatWord(string $word) : string
    {
      $word = strtolower($word);
      $word = trim($word, "-.!?\"',();");
      return $word;
    }

    // filter can be used to exclude some words
    // for example you can remove 'the', 'a'
    public static function excludeWords(string $word, array $filter = []) : bool
    {
        if (empty($word)) return true;
        return in_array($word, $filter);
    }


}
