<?
include 'similarity.php';
$items = array(
  array(
    "keywords" => array("Estrutura de repetição", "Programação", "Para faça")
  ),
  array(
    "keywords" => array("Condicional", "Algoritmos", "Se", "Senão")
  ),
  array(
    "keywords" => array("Web", "Design", "UX")
  ),
  array(
    "keywords" => array("Python", "Android", "Mining", "Web", "API")
  )
);
$profile = array('Estrutura de repetição' => 1, 'Algoritmos' => 2, 'Programação' => 1);
$keywords = Similarity::keywords_to_point($items, array_keys($profile));
$profile = $profile + $keywords;
var_dump($profile);
echo '<br />';
foreach($items as $item) {
  $ak = array_fill_keys($item['keywords'], 1) + $keywords;
  echo '<br />';
  var_dump($ak);
  echo $item['keywords'];
  echo '<br />';
  echo "score: ";
  echo Similarity::cosine($profile, $ak);
  echo '<br />';echo '<br />';
}

?>