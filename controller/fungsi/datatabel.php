<?php

function dataTabel($data)
{
  if ($data != null) {
    for ($i=0; $i < count($data); $i++) {
  		echo "<tr>";
  		for ($j=0; $j < count($data[$i]) ; $j++) {
  			echo "<td>".$data[$i][$j]."</td>";
  		}
  		echo "</tr>";
  	}
  }
}

?>
