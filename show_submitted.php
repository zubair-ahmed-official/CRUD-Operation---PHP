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
        <h1>Submit a Paper</h1>
    </div>

    <?php
	session_start();
	// Check if the item ID is stored in the session
	if(isset($_SESSION['author'])){
    $author = $_SESSION['author']; 
    // Fetch data related to the item ID
    $stmt = $db->prepare("SELECT * FROM prac_item WHERE author = ?");
    $stmt->execute([$author]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
	} else {
    // Redirect to another page if the item ID is not found in the session
    header('Location: createItem.php');
    exit();
}
?>
    <div class="container p-2">
       
            <div style="display:flex; gap:15px">
			
			<div>
			<div class="mb-3">
                <label for="itemID" class="form-label">Item ID</label>
                <input type="text" class="form-control" style="width:420px" value = "<?php echo $item['itemID']; ?>" id="itemID" name="itemID" required>
            </div>
			<div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" style="width:420px" value = "<?php echo $item['author']; ?>" id="author" name="author" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" style="width:420px" value = "<?php echo $item['email']; ?>" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="affiliate" class="form-label">Affiliate</label>
                <input type="text" class="form-control" style="width:420px" value = "<?php echo $item['affiliate']; ?>" id="affiliate" name="affiliate" required>
            </div>
                </div>
            <div>
			<div class="mb-3">
                <label for="type" class="form-label">Type of Paper</label>
                <input type="text" class="form-control" style="width:420px"value = "<?php echo $item['type']; ?>" id="type" name="type" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" style="width:420px" value = "<?php echo $item['title']; ?>" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="abstract" class="form-label">Abstract</label>
                <input type="text" class="form-control" style="width:420px" value = "<?php echo $item['abstract']; ?>" id="abstract" name="abstract" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" style="width:420px" value = "<?php echo $item['location']; ?>" id="location" name="location" required>
            </div>
                <a style="color:white; text-decoration:none" href="./item.php"><button type="" class="btn btn-secondary">Back to submission</button></a>
			</div>
			</div>
                
			</div>
            
        
    </div>

</body>
</html>