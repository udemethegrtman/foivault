<?php
require_once('includes/header.php');
require_once('includes/navigation.php');

if (isset($_POST['mkrequest'])) {
    
    $data = ['title'=>$_POST['title'],'department'=>$_POST['department'], 'time'=>time()];
    try {
        $query = "INSERT INTO `requests` (title, department, status, time) 
        VALUES ('{$data['title']}','{$data['department']}', 'pending','{$data['time']}')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }catch(PDOException $e){
        echo 'Connection Error: ' . $e->getMessage();
    }
    $message = "<div class='alert alert-success'>Succesfully sent</div>";
}
?>
<div class="wrapper">
    <h1>Ask</h1>
    <p class="lead">Make your FOI Request here</p>
    <div class="main">
        <div class="inner">
        <form method="post" action="">
            <?php if (isset($_POST['requests'])): ?>
            <h1><?= $_POST['requests']; ?></h1>
            <input type="hidden" name="title" value="<?= $_POST['requests'] ?>">
            <?php else: ?>
            <label for="title">Request Title: </label><br>
            <input type="text" size="50" name="title"><br><br>
            <?php endif; ?>
            <label for="department"></label>
            <select name="department">
                <optgroup label="Ministers">Ministers</optgroup>
                <option>Minister of Finance</option>
                <option>Minister of Agriculture</option>
                <option>Minister of Education</option>
                <optgroup label="Governors">Governors</optgroup>
                <option>Local Government</option>
                <option>State Government</option>
                <option>Federal Government</option>
            </select>
            <br><br>
            <button name="mkrequest" class="btn btn-primary">Send Request</button>

            </form>
            <br>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </div>
    </div>
</div>
<div class="footer">
</div>

<?php require_once('includes/footer.php'); ?>