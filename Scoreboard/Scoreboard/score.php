<?php
require_once("db.php");

$q = "SELECT * FROM tbl_scores";
$arr = executeSQL($q);

echo "<html>";
echo "<body>";
echo "<table>";
echo "<tr><th>uname</th><th>qid</th><th>score</th></tr>";
for ($i=0; $i<count($arr); $i++)
{
	echo "<tr>";
	foreach ($arr as $key => $val)
	{
		echo "<td>$val</td>";
	}
	echo "</tr>";
}
echo "</table>";
echo "</body>";
echo "</html>";
?>
