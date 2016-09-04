<form id="login" action="check" method = "post">

    <h1 id="ff-proof" class="ribbon">Форма входу &nbsp;&nbsp;</h1>
	
    <fieldset id="inputs">
        <input id="email" name = "email" type="text" onblur="if(this.value=='')this.value='E-mail';" onfocus="if(this.value=='E-mail')this.value='';" value="E-mail" />
        <input id="password" name= "password" type="text" onblur="if(this.value=='')this.value='Пароль';" onfocus="if(this.value=='Пароль')this.value='';" value="Пароль" />
    </fieldset>

    <fieldset id="actions">
        <input type="submit" id="submit" value="УВІЙТИ"/>
       <p class="option"><a href="#">Реєстрація</a></p>
    </fieldset>
	<br>
	<div class="error">
		<br>
		<?php echo $this->getErrorAuth();?>
	</div>
</form>
	
	<?php
		$customers =  $this->registry['customer'];

		foreach($customers as $customer)  :
		?>
			<div class="product">
				<p>Прізвище: <?php echo $customer['last_name']?></p>
				<p>Ім'я: <?php echo $customer['first_name']?></p>
				<p>Телефон: <?php echo $customer['telephone']?></p>
				<p>E-mail: <?php echo $customer['email']?></p>
				<p>Пароль: <?php echo $customer['password']?></p>
				<p>Права адміна: <?php echo $customer['admin']?></p>
			</div>
	<?php endforeach; ?>