<?php

function tambahLimit($a, $n)
{
  $index = $a * $n;
  return " LIMIT $index,$n";
}

?>
