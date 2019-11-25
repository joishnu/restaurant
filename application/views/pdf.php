<?php 
$titles = $data[0];
echo "<table><tr>";
foreach ($titles as $key => $value) {
	echo "<th>".$key."</th>";
}
echo "</tr>";

foreach ($data as $key2 => $value2) {
	echo "<tr>";
	foreach ($value2 as $key => $value) {
		echo "<td>".$value."</td>";
	}
	echo "</tr>";
}
echo "</table>";