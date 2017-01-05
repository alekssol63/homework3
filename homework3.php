<?php
//выводит получившихся животных
function out_data($arr, $cont)
{
  foreach ($arr as $key => $value) {
      if ($arr[$key][0]==$cont) $hh=$key;
    }
    foreach ($arr as $key => $value)
    {
        if ($arr[$key][0]==$cont)
        {
          echo $arr[$key][1];
          if ($key<$hh) echo ", ";
        }
    }
}
$first=array(); //континент и первое слово названия животного
$second=array();//второе слово названия животного
$output=array();
$animals = array(
      "Australia"=> array(
       "Macropus giganteus",
       "Tachyglossus aculeatus",
       "Sarcophilus laniarius",
       "Ornithorhynchus anatinus"
       ),
      "Africa"=> array(
      "Tragelaphus eurycerus",
      "Potamochoerus porcus",
      "Cercopithecus ascanius",
      "Panthera leo"
       ),
      "South America"=>array(
      "Myrmecophaga tridactyla",
      "Lama guanicoe",
      "Choloepus didactylus",
      "Priodontes maximus"

       )
  );


foreach($animals as $key=>$value)
{
  foreach ($value as $continent => $animal)
  {
    $tmp = array();
    $s=explode(" ",$animal);//разбиваем строку
    array_push($tmp,$key,$s[0]);//сохраняем континент и первое слово названия
    array_push($first,$tmp);
    unset($tmp);
    array_push($second,$s[1]) ;
  }
}

//перемешиваем массивы
shuffle($first);
shuffle($second);



while($first)
{
  $tmp = array();
  $num_first=array_rand($first);//соединяем случайные первые и вторые слова в новое название животного
  $num_second=array_rand($second);
  $str=$first[$num_first][1]." ".$second[$num_second];
  array_push($tmp,$first[$num_first][0],$str);
  array_push($output,$tmp);
  unset($tmp);
  unset($first[$num_first]);
  unset($second[$num_second]);
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Домашнее задание к лекции 1.3 «Строки, массивы и объекты»</title>
</head>
<body>
  <h2>Исходный массив</h2>
  <?php
    foreach($animals as $key=>$value)
    {
      echo "$key"."</br>";
      foreach ($value as $continent => $animal)
      {
        echo"$animal"." ";
      }
      echo "</br>";
  }

   ?>
  <h2> Австралия</h2>
  <?php
    out_data($output,"Australia" );
  ?>
  <h2> Африка</h2>
  <?php
    out_data($output,"Africa" );
  ?>
  <h2> Южная Америка</h2>
  <?php
    out_data($output,"South America" );
  ?>


</body>
</html>
