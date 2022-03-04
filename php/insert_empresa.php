<?php

// parametros de conexao
$hostname="sql486.main-hosting.eu";
$username="u384787522_helio";
$password="2Et*MNY1oJul";
$dbname="u384787522_tswebdev";


$dbmy=mysqli_connect($hostname,$username, $password,$dbname);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die ("html>script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)/script>/html>");
}

//$cid =mysql_select_db('test',$dbmy); //specify db name



$csv_file = "notaVenda.csv"; // Name of your CSV file
$csvfile = fopen($csv_file, 'r');
$theData = fgets($csvfile);
$i = 0;
while (!feof($csvfile))
{
   $csv_data[] = fgets($csvfile, 1024);
   $csv_array = explode(";", $csv_data[$i]);
   $insert_csv = array();
   $insert_csv['empresa'] = $csv_array[0];
   if ($insert_csv['empresa']=="") {
       continue;
   }
   $query =  " INSERT INTO `empresa` (`empresa`) "; 
   $query .= " VALUES('".$insert_csv['empresa']."')";

   //$query = "SELECT * FROM parcelas";
	
   $result = mysqli_query($dbmy,$query);

   $i++;
}
//$result = mysqli_query($dbmy,"commit;");
fclose($csvfile);
echo "Tabela empresa incluida!!\n";
mysqli_close($dbmy); // closing connection
?>