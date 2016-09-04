<form action="enter" method = "post">

    <center><h1 id="ff-proof" class="ribbon">Форма реєстрації &nbsp;&nbsp;</h1>
	
	<input id="text" name = "last_name" type="text" onblur="if(this.value=='')this.value='last_name';" onfocus="if(this.value=='last_name')this.value='';" value="Прізвище" />
	<br>
	<input id="text" name = "first_name" type="text" onblur="if(this.value=='')this.value='last_name';" onfocus="if(this.value=='last_name')this.value='';" value="Ім'я" />
	<br>
	<input id="password" name= "password" type="text" onblur="if(this.value=='')this.value='Пароль';" onfocus="if(this.value=='Пароль')this.value='';" value="Пароль" />
	<br>
	<input id="email" name = "email" type="text" onblur="if(this.value=='')this.value='E-mail';" onfocus="if(this.value=='E-mail')this.value='';" value="E-mail" />
	<br>
	<input id="text" name = "city" type="text" onblur="if(this.value=='')this.value='last_name';" onfocus="if(this.value=='last_name')this.value='';" value="місто" />
	<br>
	<div class="error">
		<br>
		<?php echo $this->getErrorAuth();?>
	</div>
	</center>
</form>