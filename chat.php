<h1> Chat</h1>
<hr />
<?php
 mysql_connect('localhost', 'root', '');
 mysql_select_db('test');
 ?>
 <br/>
<?php
$data1 = mysql_query('SELECT * FROM chat ORDER BY id DESC LIMIT 0,10');
while ($donnee = mysql_fetch_array($data1))
{
 echo '#' .$donnee['id']. ' par ' .htmlspecialchars(stripslashes($donnee['pseudo'])).' : <br/>';
 echo htmlspecialchars(stripslashes($donnee['message'])). '<br /><br />';
 }
?> 
<hr />
<?php
if (isset($_POST['pseudo']) && isset($_POST['message']))
{
$pseudo = mysql_escape_string($_POST['pseudo']);
$message = mysql_escape_string($_POST['message']);
 
mysql_query('INSERT INTO chat VALUES("","'.$pseudo.'","'.$message.'")');
header('Location: chat.php');
}
?>
<form action = "" method ="post">
Pseudo:<p /><input type="text" name="pseudo"/></br>
Message:<p /><textarea name="message"></textarea></br>
<input type="submit" value="envoyer" />
</form>