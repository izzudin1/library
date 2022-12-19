<?php
include('db_conn.php'); 
if(isset($_POST['nokp'])) {    
    $id = $_POST['id'];
    $namapekerja= $_POST['namapekerja'];
    $nokp = $_POST['nokp'];
    $jantina= $_POST['jantina'];
    $sql = "UPDATE pekerja SET id='$id', namapekerja='$namapekerja',nokp='$nokp', 
	jantina = '$jantina' WHERE nokp = $nokp";
    $result = mysqli_query($conn, $sql); 
    if ($result)
        echo "<script>alert('Berjaya kemaskini')</script>";
    else 
        echo "<script>alert('Tidak berjaya kemaskini')</script>";
    echo "<script>window.location='index.php'</script>";
}
$nokp = $_GET['nokp'];
$sql = "SELECT * FROM pekerja WHERE nokp = '$nokp' ";
$result = mysqli_query($conn, $sql);
while ($pekerja = mysqli_fetch_array($result)) {
    $id = $pekerja['id'];
    $namapekerja = $pekerja['namapekerja'];
    $nokp = $pekerja['nokp'];
    $jantina = $pekerja['jantina'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
        <form action="pelajar_update.php" method="post">
            <table>
                <tr>
                <td>Id:</td>
                    <td>
                        <input type="text" name="id" value='<?php echo $id;?>'>
                    </td>
                </tr>
                <tr>
                    <td>Nama pekerja:</td>
                    <td><input type="text" name="namapekerja" value="<?php echo $namapekerja;?>"></td>
                </tr>
                <tr>
                    <td>Nombor Kad Pengenalan:</td>
                    <td><input class="readonly" readonly type="text" name="nokp" value="<?php echo $nokp;?>"></td>
                </tr>
                <td>Jantina:</td>
                    <td>
                        <input class="readonly" readonly type="text" name="jantina" value='<?php echo $jantina;?>'>
                    </td>
                </tr>
                
            </table>
            <button type="submit">Submit</button>
        </form>
    </center>
</body>
</html>