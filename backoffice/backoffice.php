<?php
include_once '../class/database.php';
$db = new Database();
$dbConn = $db->dbConnect();


echo "<table border='1'><tr>
<td>email</td>
<td>password</td>
<td>firstName</td>
<td>lastName</td>
<td>type</td>
<td>modify</td>
<td>delete</td>
</tr>";
foreach ($dbConn->query('SELECT * FROM user')->fetch_all(MYSQLI_ASSOC) as $fila) {
    echo '<tr>
    <td>' . $fila['email'] . '</td>
    <td>' . $fila['password'] . '</td>
    <td>' . $fila['firstName'] . '</td>
    <td>' . $fila['lastName'] . '</td>
    <td>' . $fila['type'] . '</td>
    <td><a href="modificar.php?email=' . $fila['email'] . '">(o)</a></td>
    <td><a href="eliminar.php?email=' . $fila['email'] . '">(x)</a></td>
    </tr>';
}
echo "</table>";