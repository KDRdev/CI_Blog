<h2 class="mb-5">Latest Posts</h2>
<?php foreach($posts as $post) : ?>
    <div class="post-data">
        <h3><?php echo $post['title'];?></h3>
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo site_url() . './assets/img/posts/' . $post['post_image']?>" alt="">
            </div>
            <div class="col-md-9">
                <p>Category: <?php echo $post['name'];?></p>
                <p>Posted on: <?php echo $post['created_at'];?></p>
                <p>
                    <?php echo word_limiter($post['body'], 50);?>
                    <span><a href="<?php echo site_url('/posts/' . $post['slug']);?>">Read More</a></span>
                </p>  
            </div>
        </div>
    </div>
<?php endforeach;?>
<p><a href="<?php echo base_url();?>posts/add">Add a new post</a></p>