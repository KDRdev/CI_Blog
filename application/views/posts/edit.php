<h2>Edit post</h2>

<?php echo validation_errors();?>

<?php echo form_open('posts/update');?>
  <input type="hidden" name="id" value="<?php echo $post['id'];?>">
  <div class="form-group">
    <label for="title">Post title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter your post title" value="<?php echo $post['title'];?>">
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
      <?php foreach($categories as $category): ?>
        <option value="<?php echo $category['id'];?>"><?php echo $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="body">Post text</label>
    <textarea class="form-control" id="editor" name="body" placeholder="Your post goes here"><?php echo $post['body'];?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Edit</button>
</form>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
