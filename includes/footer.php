<!-- Javascript -->
<script src="./assets/js/jquery.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/jquery.modal.min.js"></script>
<script src="./assets/js/jquery.suggestion.js"></script>
<script src="./assets/js/site.js"></script>
<script src="./assets/js/chart.min.js"></script>

<script src="./assets/js/thub.js"></script>


<!-- Signup Modal -->
<div class="overlay"></div>

<div id="signUp" class="modal">
    <p role="link" class="closeBtn"><img src="./assets/img/exit.png" alt="close"></p>
    <h2>Sign Up</h2>
    <form method="post" action="" class="reg">
    <?php if(isset($validation_response)){
        echo $validation_response;
    }?>
    <label for="firstname">Firstname: </label><br>
    <input type="text" name="firstname" required="true">
    <label for="lastname">Lastname: </label><br>
    <input type="text" name="lastname" required="true">
    <label for="email">Email: </label><br>
    <input type="email" name="email" required="true">
    <label for="password">Password: </label><br>
    <input type="password" name="password" required="true"><br><br>
    <label for="vpassword">Verify Password: </label><br>
    <input type="password" name="vpassword" required="true"><br><br>
    <button name="register" class="btn btn-info">Register</button>
    </form>
</div>

</body>
</html>
<?php
// Close DB Connection
if(isset($conn)){
	$conn = null;
}
?>