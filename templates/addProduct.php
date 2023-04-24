<?php
// DataBase Path
require_once "app/dbQuery.php";
// Call my Database
$dataBase = new DB();
// Search Database Category Table
$query = "SELECT * FROM `category`";
// Execute the query using the query()
$result = $dataBase->query($query);
?>
<div class="col-12 col-lg-6 offset-lg-3">
    <div class="row">
        <p class="fs-3 mt-2 text-warning fw-bold text-center"> Add New Product</p>
        <hr class="text-white">
        <label for="" class="fs-5 text-white fw-bold">Product Name</label>
        <input placeholder="Add product name" type="text" class="form-control mt-2 mb-3" id="productName">
        <label for="" class="fs-5 text-white fw-bold">Product Price</label>
        <input placeholder="Add product name" type="text" class="form-control mt-2 mb-3" id="productPrice">
        <label for="" class="fs-5 text-white fw-bold">Category Name</label>
        <select class="form-select mt-2 mb-5" aria-label="Default select example" id="category">
            <option selected>Choose a category</option>
            <?php
            for ($x=0; $x < $result->num_rows; $x++) {
                 
               $categoryData =  $result->fetch_assoc();
               ?>
               <option value="<?php echo $categoryData["id"]?>"><?php echo $categoryData["category"]?></option>
               <?php
            }     
            ?> 
        </select>
        <button class="btn btn-warning fw-bold fs-5 mb-3" onclick="AddNewProductSave();">Save</button>
    </div>
</div>