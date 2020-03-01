<h2 class="text-center mb-5">Post categories</h2>
<div class="list-group col-md-4 mx-auto text-center mb-4">
<?php foreach($categories as $category):?>
    <a class="list-group-item list-group-item-action" href="<?php echo base_url() . 'categories/posts/' . $category['id'];?>"><?php echo $category['name'];?></a>
<?php endforeach;?>
</div>
<div class="row">
    <div class="mx-auto">
        <a class="btn btn-primary" href="<?php echo base_url();?>categories/add">Add a new category</a>
    </div>
</div>