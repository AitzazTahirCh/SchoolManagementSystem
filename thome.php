<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<title>Portal</title>
<style>
body {
    background-image: url(pics.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
p {
  border-block-style: groove;
  writing-mode: horizontal-tb;
  direction: rtl;
  margin-top: 20px;
  margin-bottom: 20px;
  margin-right: 500px;
  margin-left: 500px;
}
input[type="text"]
{
    background: transparent;
}
main {
border: 10px solid darkgrey;
border-style: double;
  margin-top: 10px;
  margin-bottom: 0px;
  margin-right: 500px;
  margin-left: 500px; 
}
#footer {
          position: fixed;
          padding: 10px 10px 0px 10px;
          bottom: 0;
          width: 100%;
          height: 40px;
          background:#212529;
          color: white;
        }
</style>
</head>
<body>
<?php
//this code is executed when the data is submitted
$username = 'root';
$password = '';
try {
$conn = new PDO("mysql:host=localhost;dbname=school", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}
$query_1 = $conn->query('use school');
session_start();
$teacher_id = $_SESSION['teacher_id'];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand">School Portal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="thome.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tmarks.php">Marks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tattendance.php">Attendance</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="portal.php">Log out<span class="sr-only"></span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Welcome!!!</strong>You have successfully logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div>
<?php
$query_3 = $conn->prepare("SELECT * FROM TEACHERS NATURAL JOIN SUBJECT WHERE teacher_id = ? ");
$query_3->execute([$teacher_id]);
$result_3 = $query_3->fetchall(PDO::FETCH_ASSOC);
?>
<p>  
<center><h2>Your Bio info</h2></center>
<main>
<?php
foreach ($result_3 as $key => $value) {
echo '<h4><b>Teacher Id:</b>'.' '.$value['teacher_id'].'</h4>';
echo '<h4><b>First Name:</b>'.' '.$value['f_name'].'</h4>';
echo '<h4><b>Last Name:</b>'.' '.$value['l_name'].'</h4>';
echo '<h4><b>Gender:</b>'.' '.$value['gender'].'</h4>';
echo '<h4><b>CNIC:</b>'.' '.$value['CNIC'].'</h4>';
echo '<h4><b>DOB:</b>'.' '.$value['DOB'].'</h4>';
echo '<h4><b>Age:</b>'.' '.$value['age'].'</h4>';
echo '<h4><b>Phone NO:</b>'.' '.$value['phone_no'].'</h4>';
echo '<h4><b>Subject:</b>'.' '.$value['subject_name'].'</h4>';
}
?>
</main>
</p>
<!--<table class="table table-striped table-hover">
    <thead>
    
    <tr>
  <th>Teacher Id</th>
  <th>First Name</th>
  <th>Last name</th>
  <th>Gender</th>
  <th>CNIC</th>
  <th>DOB</th>
  <th>Age</th>
  <th>Phone No</th>
  </tr>
  </thead>
  <tbody>
    <?php
        foreach ($result_3 as $key => $value) {
      echo'<tr>
        <td>'.$value['teacher_id'].'</td>
        <td>'.$value['f_name'].'</td>
        <td>'.$value['l_name'].'</td>
        <td>'.$value['gender'].'</td>
        <td>'.$value['CNIC'].'</td>
        <td>'.$value['DOB'].'</td>
        <td>'.$value['age'].'</td>
        <td>'.$value['phone_no'].'</td>
        </tr>';
    }
		?>
	</tbody>
</table>
-->
</div>
<center><div id="footer">?? zaz 2021</div></center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>