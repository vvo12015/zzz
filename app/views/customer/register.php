<br>
<?php  
    if ($this->getFormWrongDate() !== NULL) {
    $form = $this->getFormWrongDate();
    };
?>

<form class="form-horizontal" role="form" method="post" action="#">
  <div class="form-group">
    <?php echo Helper::fontRedLabel("Ім'я", empty($form["name"]));?>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="name" value = "<?php if(!empty($form["name"])){echo $form["name"];}?>">
    </div>
  </div>
  <div class="form-group">
     <?php echo Helper::fontRedLabel("Емейл", empty($form["email"]));?>
    <div class="col-sm-5">
      <input type="email" class="form-control" name="email" value = "<?php if(!empty($form["email"])){echo $form["email"];}?>">
    </div>
  </div>
  <div class="form-group">
      <?php echo Helper::fontRedLabel("Пароль", empty($form["password"]));?>
    <div class="col-sm-5">
      <input type="password" class="form-control" name="password" value = "<?php if(!empty($form["password"])){echo $form["password"];}?>">
    </div>
  </div>
  <div class="form-group">
    <?php echo Helper::fontRedLabel("Пароль(підтвердження)", empty($form["confirm_password"]));?>
    <div class="col-sm-5">
      <input type="password" class="form-control" name="confirm_password" value = "<?php if(!empty($form["confirm_password"])){echo $form["confirm_password"];}?>">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Реєстрація</button>
    </div>
  </div>

</form>   

  