<h2>Add a new post</h2>

<?php echo validation_errors();?>

<?php echo form_open_multipart('posts/add');?>
  <div class="form-group">
    <label for="title">Post title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter your post title">
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
    <textarea class="form-control" id="editor" name="body" placeholder="Your post goes here"></textarea>
  </div>
  <div class="form-group">
    <label>Image upload</label>
    <input type="file" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
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
