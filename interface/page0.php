<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="http://code.jquery.com/jquery-latest.js"></script>    
<title>Authentification</title>
</head>

<?php 

$MaConnection = mysqli_connect('localhost', 'abdallahi','password', 'test');
 
  if(isset($_POST['foo1'])){
    $sqlrequest = "Select * From  users  where email = '".$_POST['foo2']."'";
    $Resultat = mysqli_query($MaConnection, $sqlrequest);
    $rows=$Resultat->fetch_assoc();
    $password = $rows['password'];
    if(strcmp($_POST['foo1'], $password) ==0){
      header('HTTP/1.1 308');
      exit();
    }else{
      header('HTTP/1.1 309');
      exit();
    }
  
  }else{
    $password='';
    formulaire($password);
  }

  if(isset($_POST['login'])){
    $redirect_page = './page1.php';
    header('Location:'.$redirect_page);
  }
 


function formulaire(){
  echo("<body>
  <div class='container'>
      <div class='row'>
        <div class='col-md-6 offset-md-3'>
          <h2 class='text-center text-dark mt-5'>Login Form</h2>
          <div class='text-center mb-5 text-dark'>Made with HTML CSS</div>
          <div class='card my-5'>
  
            <form class='card-body cardbody-color p-lg-5' method='post' action='#'>
  
              <div class='text-center'>
                <img src='https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png' class='img-fluid profile-image-pic img-thumbnail rounded-circle my-3'
                  width='200px' alt='profile'>
              </div>
  
              <div class='mb-3'>
                <input type='text' name='login' class='form-control' id='Username' aria-describedby='emailHelp'
                  placeholder='User Name'>
              </div>
              <div class='mb-3'>
                <input type='text' class='form-control' id='password' placeholder='password' value='".$vPassword."' />
              </div>
              <div class='text-center'><button type='submit' class='btn btn-color px-5 mb-5 w-100'>Login</button></div>
            </form>
          </div>
  
        </div>
      </div>
    </div>
  </body>");
}

?>
</html>