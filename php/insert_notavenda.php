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
   $insert_csv['tipoVenda'] = $csv_array[1];
   $insert_csv['clienteCodigo'] = $csv_array[2];
 //  $insert_csv['nomeCliente'] = $csv_array[3];
   $insert_csv['dataVenda'] = $csv_array[4];
   $insert_csv['numeroNF'] = $csv_array[5];
   $insert_csv['statusNF'] = $csv_array[6];
   $insert_csv['qtdVenda'] = $csv_array[7];
   $insert_csv['valorVenda'] = $csv_array[8];
   $insert_csv['valorCusto'] = $csv_array[9];
   

   if ($insert_csv['empresa']=="") {
       continue;
   }
   $query =  " INSERT INTO `notaVenda` (`empresa`,`tipoVenda`,`clienteCodigo`,`dataVenda` "; 
   $query .=  ",`numeroNF`,`statusNF`,`qtdVenda`,`valorVenda`,`valorCusto`) "; 
   $query .= " VALUES('".$insert_csv['empresa']."'";
   $query .= ",'".$insert_csv['tipoVenda']."'";
   $query .= ",'".$insert_csv['clienteCodigo']."'";
   //$query .= ",'".$insert_csv['dataVenda']."'"; 
   $query .= ",STR_TO_DATE('".$insert_csv['dataVenda']."', '%d/%m/%Y') "; 
   $query .= ",'".$insert_csv['numeroNF']."'";
   $query .= ",'".$insert_csv['statusNF']."'";
   $query .= ",'".$insert_csv['qtdVenda']."'";
   $query .= ",'".$insert_csv['valorVenda']."'";
   $query .= ",'".$insert_csv['valorCusto']."'";
   $query .= ")";
   var_dump($query);

   //$query = "SELECT * FROM parcelas";
	
   $result = mysqli_query($dbmy,$query);
   var_dump($result);

   $i++;
}
//$result = mysqli_query($dbmy,"commit;");
fclose($csvfile);
echo "Tabela empresa incluida!!\n";
mysqli_close($dbmy); // closing connection
?>