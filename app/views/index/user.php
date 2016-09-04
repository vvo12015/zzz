<?php
    foreach($data as $review)  :
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 user-msg pd-mr" >
        <address>
          <strong><?php echo $review['name'];?></strong><?php echo $review['date'];?><br>
          <a href="mailto:#"><?php echo $review['email'];?></a>
        </address>
        <p class="text-justify"><?php echo $review['text'];?>
            <?php if ($review['file_name'] != NULL){
            echo '<img src="../../img/'.$review['file_name'].'" 
                    height = 320 width=240>';
            echo '<br>';
            }
            echo $review['date'];
         ?>
    </div>
</div>
<?php endforeach; ?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 form-stl pd-mr" >
        <button type="button" class="btn btn-primary">Попередній перегляд</button>
        <button type="button" class="btn btn-success">Відправити</button>

    </div>
</div>
<?php
    $this->generateForm();
?>