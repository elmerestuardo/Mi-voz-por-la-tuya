<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Subir archivos al servidor</title>
<meta name ="author" content ="Norfi Carrodeguas">
<style type="text/css" media="screen">
body{font-size:1.2em;}
</style>
</head>
<body>
<form enctype='multipart/form-data' action='' method='post'>
<input name='uploadedfile' type='file'><br>
<input type='submit' value='Subir archivo'>
</form>
<?php 
    session_start();
     $now = time();
$num = date("w");
if ($num == 0)
{ $sub = 6; }
else { $sub = ($num-1); }
$WeekMon  = mktime(0, 0, 0, date("m", $now)  , date("d", $now)-$sub, date("Y", $now));    //monday week begin calculation
$todayh = getdate($WeekMon); //monday week begin reconvert

$d = $todayh[mday];
$m = $todayh[mon];
$y = $todayh[year];
    $time = time();
    
    
$target_path = "uploads/";
    
    
    $ext = pathinfo($_FILES['uploadedfile']['name'], PATHINFO_EXTENSION);
    $lala="uploads/$d-$m-$y-$time-".$_SESSION['Codigo_Usuario'].".".$ext;
    //$lala=$lala . basename($_FILES['name'];
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $lala)) 
    { 
echo "<span style='color:green;'>El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido</span><br>";
    
    echo "<span style='color:green;'>El archivo ". basename( $_FILES['uploadedfile']['tmp_name']). " ha sido subido</span><br>";
    
}else{
echo "Ha ocurrido un error, trate de nuevo!";
}
    
   
echo "$d-$m-$y-$time-".$_SESSION['Codigo_Usuario']."."; //getdate converted day
    
?>

</body>
</html>