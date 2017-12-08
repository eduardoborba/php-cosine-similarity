<?php
class Similarity {
  static public function keywords_to_point($items, $profile) {
    $keywords = array();
    foreach($items as $item) {
      $keywords = array_merge($keywords, $item['keywords']);
    }
    $keywords = array_merge($keywords, $profile);
    $keywords = array_unique($keywords);

    $keywords = array_fill_keys($keywords, 0);
    ksort($keywords);
    return $keywords;
  }
  protected function dot_product($a, $b) {
    $products = array_map(function($a, $b) {
      return $a * $b;
    }, $a, $b);
    return array_reduce($products, function($a, $b) {
      return $a + $b;
    });
  }
  protected function magnitude($point) {
    $squares = array_map(function($x) {
      return pow($x, 2);
    }, $point);
    return sqrt(array_reduce($squares, function($a, $b) {
      return $a + $b;
    }));
  }
  static public function cosine($a, $b) {
    ksort($a);
    ksort($b);
    return self::dot_product($a, $b) / (self::magnitude($a) * self::magnitude($b));
  }
}