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

	<?php
// Start the session
session_start();

// Store data in session variables

?>
</head>

<body>
    <div class="container">
        <h1>Submit a Paper</h1>
    </div>

    <div class="container p-2">
       
            
        <form method = "post" action = "engine.php">
            
            <div style="">
			
			<div>
			<div class="mb-3">
                <label for="itemID" class="form-label">Item ID</label>
                <input type="text" class="form-control" style="width:420px" id="itemID" name="itemID" required>
            </div>
			<div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" style="width:420px" id="author" name="author" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label> 
                <input type="email" class="form-control" style="width:420px" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="affiliate" class="form-label">Affiliate</label>
                <input type="text" class="form-control" style="width:420px" id="affiliate" name="affiliate" required>
            </div>
           
                
                <button type="submit" class="btn btn-primary" name = "check">Next</button>
             
           <a href="item.php"> <button type="button" class="btn btn-secondary" name = "cancel" >Cancel</button></a>
			</div>
			</div>
            
        </form>
    </div>

</body>
</html>