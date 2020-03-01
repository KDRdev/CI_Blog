<h2><?php echo $title;?></h2>

<?php echo validation_errors();?>

<?php echo form_open_multipart('categories/add');?>
    <div class="form-group">
        <label name="" for=""></label>
        <input type="text" class="form-control" name="name" placeholder="Enter category name">
    </div>
    <button class="" type="submit" class="btn btn-default">Submit</button>
</form>