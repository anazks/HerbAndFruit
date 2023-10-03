<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}
.icons{
    width:100px;
    height:100px
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

</style>
</head>
<body>

<h2>Login Form</h2>

<form action="login.php" method="post">
  <div class="imgcontainer">
    <img class="icons" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdZieuDkM2kKNDCK4I_pG8YwAlD5YLBMCBx5bXrm-r99Y8paitPcKpi6cU1a4b-gR5s9Q&usqp=CAU" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" id="name" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" id="name" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
   
  </div>

  <div class="container" style="background-color:#f1f1f1">
  <a href="../"> <button type="button" class="cancelbtn" >Cancel</button></a>
    
   
  </div>
</form>
    <?php
    session_start();

        $servername = "localhost"; // Change this to your database server
        $username = "root"; // Change this to your database username // Change this to your database password
        $database = "ecommerce"; // Change this to your database name
        $password = "";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["uname"];
    $password = $_POST["psw"];

    $sql = "SELECT * FROM admin_info WHERE admin_email = '$username' AND admin_password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Successful login
        $_SESSION["username"] = $username;
        header("Location: index.php"); // Redirect to a dashboard page or another authorized page
        exit();
    } else {
        // Invalid credentials
        echo "Invalid username or password. <a href='login.html'>Try again</a>";
    }
}

$conn->close();
        ?>

<script>
      function cancel(){
        document.getElemetById("name").value = ""
      }
  </script>

</body>
</html>
