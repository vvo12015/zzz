<?php

$customers =  $this->registry['customer'];

foreach($customers as $customer)  :
?>

    <div class="product">
        <p> Прізвище: <?php echo $customer['last_name']?></p>
        <p> Ім'я: <?php echo $customer['first_name']?></p>
    </div>
<?php endforeach; ?>

