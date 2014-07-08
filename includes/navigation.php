<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand white" href="./"><h3>FOI Vault</h3></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="act.php">FOI Act</a></li>
                    <li><a href="statistics.php">Usage Stats</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="requests.php">Requests</a></li>
                    <?php
                    $signUp = '<li><a  class="modalLink" href="#signUp">Sign Up</a></li>';
                    $signIn = '<li><a href="./#auth">Sign in</a></li>';
                    $signOut = '<li><a href="logout.php">Sign Out</a></li>';
                    echo view_access($signUp."\n\t".$signIn,$signOut);
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>