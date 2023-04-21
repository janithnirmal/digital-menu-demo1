<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
</head>
<body>
        <div class="container-fluid">
            <div class="row bg-dark mt-2 p-2">

                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="row">
                            <p class="fs-3 mt-2 text-warning fw-bold text-center"> Add New Product</p>
                            <hr class="text-white">
                            <label for="" class="fs-5 text-white fw-bold">Product Name</label>
                            <input type="text" class="form-control mt-2 mb-3">
                            <label for="" class="fs-5 text-white fw-bold">Product Price</label>
                            <input type="text" class="form-control mt-2 mb-3">
                            <label for="" class="fs-5 text-white fw-bold">Category Name</label>
                            <select class="form-select mt-2 mb-5" aria-label="Default select example">
                                <option selected>Choose a category</option>
                                <option value="1">Noodles</option>
                                <option value="2">chips</option>
                                <option value="3">Burgers</option>
                            </select>
                            <button class="btn btn-warning fw-bold fs-5 mb-3">Save</button>
                        </div>
                    </div>

            </div>
        </div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>
</html>