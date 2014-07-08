<?php
require_once('includes/header.php');
require_once('includes/navigation.php');
?>
<div class="wrapper">
    <h1>Infographics</h1>
    <p class="lead">FOIvault usage statistics</p>
    <div class="main">
        <section class="sections">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>FOI request Submissions for the year 2014. Statistics showing data from January till June.</p>
                        <p>Statistics table changes in 6 months.</p>
                    </div>
                    <div class="col-md-6">
                        <!-- line chart canvas element -->
                        <canvas id="buyers" width="500" height="300"></canvas>
                    </div>
                </div>
            </div>
        </section>

        <section class="sections sec2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <!-- bar chart canvas element -->
                        <canvas id="income" width="500" height="300"></canvas>
                    </div>
                    <div class="col-md-6">
                        <p>Multiple bar chart illustrating the verified and ignored requests over the months January to
                            February, 2014</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="sections sec3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p><span class="shape pending"></span> Pending Requests</p>
                        <p><span class="shape verified"></span> Verified Requests</p>
                        <p><span class="shape ignored"></span> Ignored Requests</p>
                    </div>
                    <div class="col-md-6">
                        <!-- pie chart canvas element -->
                        <canvas id="countries" width="500" height="300"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="footer">
</div>

<?php require_once('includes/footer.php'); ?>

<script src="./assets/js/chart.js"></script>