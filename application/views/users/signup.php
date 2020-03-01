<?php echo validation_errors();?>
<?php echo form_open('users/register'); ?>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h2><?php echo $title;?></h2>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="name">
            </div>
            <div class="form-group">
                <label for="">User name</label>
                <input type="text" class="form-control" name="username" placeholder="username">
            </div>
            <div class="form-group">
                <label for="">Zip code</label>
                <input type="text" class="form-control" name="zipcode" placeholder="zipcode">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" placeholder="email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="confirm password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
    </div>
<?php echo form_close(); ?>