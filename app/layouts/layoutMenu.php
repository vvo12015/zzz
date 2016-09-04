<nav class="navbar navbar-default">
  
        <div class="row">
            <div class="col-md-2"><?php echo Helper::linkClass("navbar-brand", "/index/index", "Головна");?></div>
            <div class="col-md-6"><h1 class="text-center text-uppercase head-ttl"><?php echo $this->getTitle();?></h1></div>
            <div class="col-md-4">
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php 
                            $customer = Helper::getCustomer();                    
                            if (!empty($customer)) {
                                echo '<li><a href="http://' . BP . '/index/index"><span class="glyphicon glyphicon-log-out"></span>' . $customer['last_name'] . " " 
                                        . $customer['first_name'] . '</a></li>';
                                echo '<li><a href="' . BP . '/customer/logout/"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                            }else{
                                echo '<li><a href="http://' . BP . '/customer/register/"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
                                echo '<li><a href="http://' . BP . '/customer/login/"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                            }
                        ?>                
                    </ul>
        </div>
        <!--/.nav-collapse -->
    </div>

