<?php
    $reviews = Helper::getModel("Moderator")->getData();
    echo '<br>';
    var_dump($reviews);
foreach($reviews as $review)  :
?>

<?php 
    include '../../layouts/layoutForm.php';
    ?>
<?php endforeach; ?>
