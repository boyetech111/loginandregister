<?php
session_start();
?>
<html>
    <head>
        <title>Admin Login</title>
    </head>

<body bgcolor="#59906F">

    <form method="post" action="login.php">

        <table width="400" border="10" align="center"
         bgcolor="#7EB575">

            <tr>
              <td bgcolor="#F9F871" colspan="4" align="center"><h1>Admin Login Form</h1></td>
            </tr>

            <tr>
                <td align="right">User Name</td>
                <td><input type="text" name="user_name"></td>
            </tr>

            <tr>
                <td align="right">User Password</td>
                <td><input type="password" name="user_pass"></td>
            </tr>

            <tr>
                <td colspan="4" align="center"><input type="submit" name="login" value="login"></td>
                <td></td>
            </tr>


        </table>
    </form>


</body>
</html>
<?php
include("includes/connect.php");

if(isset($_POST['login'])){
  
    $user_name = $_POST['user_name'];
    $user_pass = $_POST['user_pass'];

    $admin_query = "select * from admin_login where user_name = '$user_name' AND user_pass = '$user_pass'";

    $run = mysqli_query($mysqli,$admin_query);
    if(mysqli_num_rows($run)>0){

    $_SESSION['user_name']=$user_name;
    header('location:index.php');
    }
    else {
        echo "<script>alert('username or password is incorrect')</script>";
    }

}



?>