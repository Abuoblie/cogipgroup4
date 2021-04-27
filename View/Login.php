<?php
require_once "../include/header.php";


if (isset($_POST['submit'])) {
   $signIn = new Validation();
   $user = $signIn->login($_POST['email'], sha1($_POST['pswd']));
   if(!empty($_SESSION)){
    header("location: ../index.php");
   }
}


?>
<div class="row justify-content-center">


   <form action="Login.php" method="POST">

      <div style="width: 50%; height: 30%; position: relative; margin-left: auto; margin-right: auto;">
         <div class="form-group mb-2">
            <label class="control-label" for="email">email:</label> <input type="text" id="email" required maxlength="48" name="email" class="form-control" placeholder="Enter your email">
         </div>
         <div class="form-group mb-2">
            <label class="control-label" for="pswd">password:</label> <input type="text" id="vat required maxlength=" 48" name='pswd' class="form-control" placeholder="Enter password">
         </div>
         <div class="form-group">

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
         </div>

      </div>
   </form>
</div>
</div>

<?php
require_once "../include/footer.php";
?>
