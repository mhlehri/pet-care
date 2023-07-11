<?php  include('header.php'); ?>

    <div class="col-md-9">
        <div class="container edit_main_div">
            <div class="add-items  contain_edit text-center">
                <h3>ADD ITEMS</h3>
                <button onclick="window.location.href='add_cat_product.php'" type="submit" class="btn btn-outline-primary form-control my-2">Add Cat items</button>
                <button onclick="window.location.href='add_dog_product.php'" type="submit" class="btn btn-outline-danger form-control my-2">Add Dog items</button>
                <button onclick="window.location.href='add_bird_product.php'" type="submit" class="btn btn-outline-success form-control my-2">Add Bird items</button>
                <button onclick="window.location.href='add_medicine.php'" type="submit" class="btn btn-outline-secondary form-control my-2">Add Pets Medicine</button>
                <button onclick="window.location.href='add_bestselling.php'" type="submit" class="btn btn-outline-dark form-control my-2">Add Best Selling</button>
            </div>
        </div>
    </div>

<?php include('footer.php');?>