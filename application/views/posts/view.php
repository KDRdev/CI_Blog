<h2><?php echo $post['title'];?></h2>
<img src="<?php echo base_url() . 'assets/img/posts/' . $post['post_image']?>" alt="">
<p>Posted on: <?php echo $post['created_at'];?></p>
<div class="post-body">
    <?php echo $post['body'];?>
</div>
<hr>
<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
    <p><a class="btn btn-default" href='<?php echo base_url();?>posts/edit/<?php echo $post['slug'];?>'>Edit Post</a></p>

    <?php echo form_open('/posts/delete/'.$post['id']);?>
        <input type="submit" value="delete" class="btn btn-danger">
    </form>
<?php endif;?>
<h3>Comments</h3>
<?php if ($comments) : ?>
    <?php foreach($comments as $comment) : ?>
    <div>
        <span>By <em><?php echo $comment['name'];?></em></span>
        <p><?php echo $comment['body'];?></p>
    </div>
<?php endforeach;?>
<?php else : ?>
    <p>No comments here yet.</p>
<?php endif; ?>    
<hr>
<h3>Add comment</h3>

<?php echo validation_errors();?>

<?php echo form_open('/comments/add/'.$post['id']);?>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="body">Your comment</label>
        <textarea name="body" class="form-control"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?php echo $post['slug'];?>">
    <button class="btn btn-primary" type="submit">Submit</button>
</form>