<?php include 'koneksi.php'; session_start(); ?>
    <?php 
    if (isset($_POST['login'])) {
    

   $username = $_POST['username'];
   $password = $_POST['password'];

   $login = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");
   $periksa = mysqli_num_rows($login);
   if ($periksa > 0) {
    $_SESSION['username'] = $username;
    header('location: index.php');      
    } else {
    echo "<script>alert('Username Atau Password Anda Salah');</script>";
    }  
  }
?>

<!-- SIGN UP -->
<?php 

include 'koneksi.php';

if( isset($_POST['signup']) )
{
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "insert into tb_admin values ('','$nama','$username','$password')";
    $query = mysqli_query($koneksi, $sql);

    if($query) {
        header('Location: login.php');
    } else {
        echo "ERRORRR";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Masuk</title>
  <style type="text/css">
    body {
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: "Jost", sans-serif;
      background: #24243e;
    }
    .main {
      width: 350px;
      height: 500px;
      background: blue;
      overflow: hidden;
      background: #1c87c9;
      border-radius: 10px;
      box-shadow: 5px 20px 50px #000;
    }
    #chk {
      display: none;
    }
    .signup {
      position: relative;
      width: 100%;
      height: 100%;
    }
    label {
      color: #fff;
      font-size: 2.3em;
      justify-content: center;
      display: flex;
      margin: 60px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.5s ease-in-out;
    }
    input {
      width: 60%;
      height: 20px;
      background: #e0dede;
      justify-content: center;
      display: flex;
      margin: 20px auto;
      padding: 10px;
      border: none;
      outline: none;
      border-radius: 5px;
    }
    button {
      width: 60%;
      height: 40px;
      margin: 10px auto;
      justify-content: center;
      display: block;
      color: #fff;
      background: #8ebf42;
      font-size: 1em;
      font-weight: bold;
      margin-top: 20px;
      outline: none;
      border: none;
      border-radius: 5px;
      transition: 0.2s ease-in;
      cursor: pointer;
    }
    button:hover {
      background: #6d44b8;
    }
    .login {
      height: 460px;
      background: #eee;
      border-radius: 60% / 10%;
      transform: translateY(-180px);
      transition: 0.8s ease-in-out;
    }
    .login label {
      color: #573b8a;
      transform: scale(0.6);
    }
    #chk:checked ~ .login {
      transform: translateY(-500px);
    }
    #chk:checked ~ .login label {
      transform: scale(1);
    }
    #chk:checked ~ .signup label {
      transform: scale(0.6);
    }
  </style>
</head>

<body>
  <div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">

    <div class="signup">
      <form action="" name="signup" method="POST">
        <label for="chk" aria-hidden="true">Sign Up</label>
        <input type="text" name="nama" placeholder="Nama" required="">
        <input type="text" name="username" placeholder="Username" required="">
        <input type="password" name="password" placeholder="Password" required="">
        <button name="signup" class="btn">Submit</button>
      </form>
    </div>

    <div class="login">
      <form action="" name="login" method="POST">
        <label for="chk" aria-hidden="true">Sign In</label>
        <input type="teks" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button name="login" class="btn">Sign In</button>
      </form>
    </div>
  </div>
</body>

</html>