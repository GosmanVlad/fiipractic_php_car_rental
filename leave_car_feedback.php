<?php include('header.php'); 
if(!isset($_SESSION['auth']))
header("Location: index.php");
else
{
    $carid=$_GET['carid'];
    $result = vQuery_Select("SELECT name, image FROM cars WHERE id='$carid'");
    $result->execute();
    $row=$result->fetch();
    $carName = $row['name'];
    $carImage = $row['image'];
}
?>

<body>
    <?php Menu() ?>
    <div class="body-container"><div class="body-wall"><br>
        <h1>Feedback pentru masina <?php echo $carName ?></h1>
        <center><p><div class='box-container'><img src='images/<?php echo $carImage?>'></img></div></center>
        <hr>
        <form method="POST" action="car_feedback_back.php">
            <?php 
                if(isset($_SESSION['auth'])) {
                    $name = $_SESSION['name'];
                    echo '<label>Nume:</label>';
                    echo '<input type="text" name="username" class="form-control" value="'.$name.'" readonly>';
                }
                else {
                    echo '<div class="row">
                    <div class="col-sm">';
                    echo '<label>Nume:</label>';
                    echo '<input type="text" name="username" class="form-control" placeholder="Numele tau"></div>';

                    echo '<div class="col-sm">';
                    echo '<label>Email:</label>';
                    echo '<input type="text" name="email" class="form-control" placeholder="Email-ul tau"></div>';
                    echo '</div>';
                }
            ?><br>
            <input name="carid" type="hidden" value="<?php echo $carid ?>">
            <label>Feedback</label>
            <textarea class="form-control" rows="5" name="feedback"></textarea><br>
            <button type="submit" class="btn btn-success btn-block">Trimite</button>
        </form>
    </div></div>

    <?php Footer() ?>

</body>