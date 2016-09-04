<?php
    foreach($this->data as $review)  :
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 user-msg pd-mr" >
        <address>
          <strong><?php echo $review['name'];?></strong><?php echo $review['date'];?><br>
          <a href="mailto:#"><?php echo $review['email'];?></a>
        </address>
        <p class="text-justify"><?php echo $review['text'];?>
        <?php if ($review['file_name'] != NULL):?>
        <img src="../../img/'.$review['file_name'].'" height = 320 width=240>
        <?php endif;?>
    </div>
</div>
<?php endforeach; ?>
<div class="row hiddenDiv" id="preview">
    <div class="col-md-3"></div>
    <div class="col-md-6 user-msg pd-mr" >
        <address>
            <strong id="namePreview"></strong><p id="datePreview"></p>
            <a href="mailto:#" id="emailPreview"></a>
        </address>
        <p class="text-justify" id="messagePreview"></p>
        <img id="imgPreview" height = 320 width=240>
    </div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 form-stl pd-mr" >
        <button type="button" class="btn btn-primary" onclick="myFunction()">Попередній перегляд</button>
        <button type="submit" class="btn btn-success">Відправити</button>
    </div>
</div>
<?php
    $this->generateForm();  
?>