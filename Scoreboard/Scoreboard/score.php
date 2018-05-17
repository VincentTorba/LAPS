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
		$uname = $val["uname"];
		$qid= $val["qid"];
		$grade = $val["score"];
		echo "<td>$uname</td>";
		echo "<td>$qid</td>";
		echo "<td>$grade</td>";
	}
	echo "</tr>";
}
echo "</table>";
$q1 = "SELECT uname,SUM(score) FROM tbl_scores GROUP BY uname;";
$arr1 = executeSQL($q1);
echo "<table>";
echo "<tr><th>uname</th><th>total</th></tr>";
 echo "<tr>";
 foreach ($arr1 as $key => $val)
 {
	$uname = $val["uname"];
        $grade = $val["SUM(score)"];
         echo "<td>$uname</td>";
         echo "<td>$grade</td>";
 }
echo "</tr>";
echo "</table>";
echo "</body>";
echo "</html>";
?>
