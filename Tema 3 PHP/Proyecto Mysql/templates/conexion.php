 <?php $servername = "sql308.thsite.top";
  $username = "thsi_38097488";
  $password = "xxxxxxxxx";
  $dbname = "thsi_38097488_ejemplo";
  $enlace = mysqli_connect($servername,$username,$password,$dbname);
  if (!$enlace){
      die("Ocurrio un problema con la conexion:" . mysqli_connect_error());
  }

