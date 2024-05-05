<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice 6</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <?php
    // include the database file 
    include('db_conn.php'); ?>
</head>

<body>
    <div class="container">
        <h1>Update Item</h1>
    </div>
    <?php 
    //Get the data related to the corresponding Item ID
    if(isset($_GET['update'])){
        $id = $_GET['item_id'];   
        $stmt = $db->prepare("SELECT * FROM prac_item WHERE itemID = ?");
        $stmt->execute([$id]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
    };
    ?>

    <div class="container p-2">
        <form method = "post" action = "engine.php">
            <div class="mb-3">
                
                <input type="text" class="form-control" id="itemID" name="itemID" value = "<?php echo $item['itemID']; ?>" hidden>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value = "<?php echo $item['author']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">type</label>
                <input type="text" class="form-control" id="type" name="type" value = "<?php echo $item['type']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control" id="title" name="title" value = "<?php echo $item['title']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="abstract" class="form-label">abstract</label>
                <input type="text" class="form-control" id="abstract" name="abstract" value = "<?php echo $item['abstract']; ?>" required>
            </div>
            <button type="submit" class="btn btn-secondary"><a style="color:white" href="./item.php">Cancel</a></button>
            <button type="submit" class="btn btn-primary" name = "update">Update</button>
        </form>
    </div>

</body>

</html>