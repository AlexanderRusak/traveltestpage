<?php
$count=0;
$numberOfMines=0;
$handle = @fopen("minesweeper.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        echo $buffer.'<br />';
        $arr[$count]=str_split($buffer);

          $count++;
    }
    if (!feof($handle)) {
        echo "Ошибка: fgets() неожиданно потерпел неудачу\n";
    }
    fclose($handle);
    $lines=0;
    for($lines=0;$lines<$count; $lines++){
      for ($i=0; $i <count($arr[$lines]); $i++) {
        if($arr[$lines][$i]=="O"){
          if($arr[$lines][$i-2]=='X' ){
            $numberOfMines++;
          }
          if($arr[$lines][$i+2]=='X') {
            $numberOfMines++;
          }
          if($arr[$lines+1][$i]=='X') {
            $numberOfMines++;
          }
          if($arr[$lines-1][$i]=='X') {
            $numberOfMines++;
          }
          if($arr[$lines-1][$i]=='0') {
            $numberOfMines--;
          }
          $arr[$lines][$i]=$numberOfMines;
          $numberOfMines=0;

        }

      }
    }


}
for ($j=0; $j < $count; $j++) {
file_put_contents('hello.txt', $arr[$j], FILE_APPEND);
}



 ?>
