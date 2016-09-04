<form class="form-horizontal" role="form" method="post" action="<?php echo BP;?>/customer/login">
  <div class="form-group">
    <label class="control-label col-sm-2" for="telephone">Емейл:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Пароль:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" >
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">LogIn</button>
    </div>
  </div>

</form>