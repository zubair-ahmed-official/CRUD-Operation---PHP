<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice 6</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <?php
    // include the database file 
    include('db_conn.php'); ?>
</head>

<body>
    <div class="container">
        <h1>Submission List</h1>
    </div>

    <div class="container p-2">
        <a href="check_author.php" class="btn btn-sm btn-secondary">Submit a new paper</a>
        <table class="table">
            <tr>
                <td>Paper ID</td>
                <td>Author</td>
                <td>Type</td>
				<td>Title</td>
				<td>Abstract</td>
				<td>Location</td>
				<td>Score</td>
				<td>Action</td>
            </tr>
            <?php
            // query for selecting / retrieving every row from the table customer
            $query = "SELECT * FROM prac_item";

            //run the SQL
            // query() <-function to execute the query in the database
            $stmt = $db->query($query);

            //call a method "fetch"
            //PDO::FETCH_ASSOC: returns an array indexed by column name as returned in your result set
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                <tr>
                    <td><?php echo $row['itemID']; ?></td>
             		<td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['type']; ?></td>
             		<td><?php echo $row['title']; ?></td>
             		<td><?php echo $row['abstract']; ?></td>
             		<td><?php echo $row['location']; ?></td>
             		<td><?php echo $row['score']; ?></td>
            <td>
                  <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Reviewer</button>                 
                  <div class="modal" id="myModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                  
                        <div class="modal-header">
                          <h4 class="modal-title">Registration</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body" id="reviewerInfo">
           	 			<ul>
            			<li>  <?php echo $row['author']; ?></li>
                          <li> <?php echo $row['score']; ?></li>
            			</ul>
                        </div>
                  
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                        </div>
                      </div>
                    </div>
                  </div>
                
            </td>
            
             <td> <form method="get" action = "update.php"><td><button type = "submit" class = "btn btn-sm btn-warning" name = "update" id = "update"> Update</button></td>
             <input  type="text" id = "item_id" name = "item_id" value="<?php echo $row['itemID']; ?>" hidden>
        	 </form></td>
                   
			 <td>
             <form method="POST" action = "engine.php">
             <input  type="text" id = "item_id" name = "item_id" value="<?php echo $row['itemID']; ?>" hidden>
             <button type = "submit" class = "btn btn-sm btn-danger" name = "delete" id = "delete"> Delete</button>
        </form>
</td>
                </tr>


            <?php } ?>

        </table>
     
    </div>
         
     
 <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

</html>