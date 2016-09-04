<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 form-stl pd-mr">
        <form method="POST" action="">
            <div class="from-group">
                <label for="name" class="col-sm-5 control-label">Ім'я користувача</label>
                <input type="text" class="form-control pd-mr" id="name" value="<?php echo $this->data['name'];?>">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <input type="email" class="form-control pd-mr" id="email" value="<?php echo $this->data['email'];?>">
                <?php if ($status_admin):?>
                <label for="input_date" class="col-sm-10 control-label">Дата створення повідомлення</label>
                <input type="date" name="date_create" 
                       class="form-control pd-mr"
                       id="input_date"
                       value="<?php echo $this->data['date_create'];?>"/>
                <?php endif;?>
                <label for="message" class="col-sm-2 control-label">Повідомлення</label>
                <textarea name="text" class = "form-control pd-mr" id="message"><?php echo $this->data['text'];?></textarea>
                <input type="file" multiple="multiple" accept=".jpg, .gif, .png">
                <a href="#" class="submit button">Загрузить файлы</a>
                <div class="ajax-respond"></div>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>