<?php
require_once('includes/header.php');
require_once('includes/navigation.php');

if(isset($_POST['login'])){
    $credentials = ['user'=>$_POST['uname'],'pass'=>$_POST['pwd']];

    try {
        $query = 'SELECT * FROM users WHERE email = :email';
        $result_set = $conn->prepare($query);
        $result_set->execute([':email' => $credentials['user']]);
        foreach ($result_set as $found) {
            if ((password_verify($credentials['pass'], $found['password'])) && ($result_set->rowCount() == 1)) {
                $_SESSION['user_id'] = $found['id'];
                $_SESSION['user'] = $found['email'];
                redirect('ask.php');
            }else{
                $message = "<div class=\"notify\">Wrong username/password combination</div>";
            }
        }
    } catch (PDOException $e) {
        echo "Database query error: ". $e->getMessage();
    }

}
// Fetch Recent Requests
$requests = $conn->prepare('SELECT * FROM requests');
$requests->execute();
?>

    <div class="intro-overtake"></div>
    <div class="intro-header">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <img src="./assets/img/logo.png" alt="FOIA">
                        <h1>FOI Vault</h1>
                        <p>Search for existing requests or <a href="ask.php">log requests you've made</a></p>
                        <form method="post" action="ask.php">
                        <input type="text" id="text1" name="requests" placeholder="Search for FOI requests made...">
                        <button class="searchbtn" type="submit">
                            <i class="fa fa-3x fa-arrow-circle-right"></i>
                        </button>
                        <script>
                        $("#text1").suggestion({
                          url:"data.php?chars="
                        });
                        </script>
                    </form>
                    </div>
                    <a href="#content"><img src="./assets/img/down.png"></a>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <div id="content" class="content-section-b">

        <div class="information">
            <h1>Recent Requests</h1>
            <ul class="request-list">
                <?php foreach($requests as $count => $request): ?>
                <li><a href=""><?= $request['title']; ?></a>
                    <i class="time">to <?= $request['department']; ?> on <?= date('jS F, Y H:i A',$request['time']); ?></i>
                    <?php if($request['status'] === 'verified'): ?>
                    <span class="pull-right btn btn-success"><?=  $request['status']; ?></span>
                    <?php elseif($request['status'] === 'pending'): ?>
                    <span class="pull-right btn btn-warning"><?=  $request['status']; ?></span>
                    <?php elseif($request['status'] === 'ignored'): ?>
                    <span class="pull-right btn btn-danger"><?=  $request['status']; ?></span>
                    <?php endif; ?>
                </li>
                <?php if($count > '9'){ break; } ?>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
    <!-- /.content-section-b -->

    <div id="auth" class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Sign In</h2>
                    <form method="post" action="">
                    <p class="lead"><input type="text" name="uname" placeholder="Email" required="true"></p>
                    <p class="lead"><input type="password" name="pwd" placeholder="Password" required="true"></p>
                    <button class="btn btn-primary" name="login">Sign In</button>
                    </form>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="./assets/img/lock3.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Connect to our social media:</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li><a href="https://twitter.com/foivaultnig" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li><a href="https://www.facebook.com/foiavault" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li><a href="#home">FOI Act</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#about">Requests</a>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; foivault 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

<?php require_once('includes/footer.php'); ?>
