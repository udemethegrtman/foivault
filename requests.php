<?php
require_once('includes/header.php');
require_once('includes/navigation.php');
?>
<div class="wrapper">
    <h1>Requests</h1>
    <p class="lead">FOI requests Made</p>
    <div class="main">
        <div class="inner">
        <?php
        try {
          $result = $conn->prepare('SELECT * FROM `requests`');
          $result->execute();
          $requests = $result->fetchAll();
          foreach ($requests as $key => $request) {
            $request_data[$key] = $request['id'];
          }
        } catch (PDOException $e) {
          echo 'Query Error: ' . $e->getMessage();
        }
        if(!isset($_GET['id']) || !in_array($_GET['id'], $request_data)){
          echo "<p>There's no request here</p>";
        }else{
          try {
            $bind = [':id' => $_GET['id']];
            $getrequest = $conn->prepare('SELECT * FROM `requests` WHERE `id` = :id');
            $getrequest->execute($bind);
            $requestPull = $getrequest->fetch();
            
            echo "<h2>".$requestPull['title']."</h2>";
          } catch (PDOException $e) {
              echo 'Query Error:' . $e->getMessage();
          }
        }
        ?>
        </div>
    </div>
</div>
<div class="footer">
</div>

<?php require_once('includes/footer.php'); ?>