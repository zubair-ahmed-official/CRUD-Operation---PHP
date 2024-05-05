<?php

include('db_conn.php');


if(isset($_POST['add'])){
    	$id = $_POST['itemID'];
        $author = $_POST['author'];
        $type = $_POST['type'];
        $title = $_POST['title'];
        $abstract = $_POST['abstract'];
		$location = $_POST['location'];
		$score = $_POST['score'];
		$email = $_POST['email'];
		$affiliate = $_POST['affiliate'];

        $sql = "INSERT INTO prac_item (itemID, author, type, title, abstract, location, score, email, affiliate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id, $author, $type, $title, $abstract, $location, $score, $email, $affiliate]);

        echo "<script>
        window.location.href='item.php';
        alert('Item has been updated');
        </script>";
}


if(isset($_POST['update'])){
    $id = $_POST['itemID'];
    $author = $_POST['author'];
    $type = $_POST['type'];
    $title = $_POST['title'];
    $abstract = $_POST['abstract'];

$sql = "UPDATE prac_item SET author=?, type=?, title=?, abstract=?  WHERE itemID = ?";
$stmt = $db->prepare($sql);
$stmt ->execute([$author, $type, $title, $abstract, $id]);

echo "<script>
window.location.href='item.php';
alert('Item has been updated');
</script>";
}

if(isset($_POST['delete'])){
    $id = $_POST['item_id'];
  
$sql = "DELETE FROM prac_item WHERE itemID = ?";
$stmt = $db->prepare($sql);
$stmt ->execute([ $id]);

echo "<script>
window.location.href='item.php';
alert('Item has been deleted');
</script>";
}

if(isset($_POST['check'])){
	session_start();
	$_SESSION['itemID'] = $_POST['itemID'] ?? '';
	$_SESSION['email'] = $_POST['email'] ?? '';
	$_SESSION['affiliate'] = $_POST['affiliate'] ?? '';
	$_SESSION['author'] = $_POST['author'];
	$author = $_POST['author'];

    // Prepare the SQL statement to check if the author exists in prac_item
    $stmt = $db->prepare("SELECT author FROM prac_item WHERE author = ?");
    $stmt->execute([$author]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the author exists in the database
    if ($result && $result['author'] === $author) {
        // Author exists in prac_item, redirect to createItem.php
        echo "<script>window.location.href='already_submitted.php';</script>";
        // exit(); // Stop further execution
    } else {
        // Author does not exist in prac_item, redirect to item.php
        echo "<script>window.location.href='createItem.php';</script>";
        exit(); // Stop further execution
    }
}

if(isset($_POST['show'])){
	session_start();
	$_SESSION['author'] = $_POST['author'];
	$author = $_POST['author'];

    // Prepare the SQL statement to check if the author exists in prac_item
    $stmt = $db->prepare("SELECT author FROM prac_item WHERE author = ?");
    $stmt->execute([$author]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the author exists in the database
    if ($result && $result['author'] === $author) {
        // Author exists in prac_item, redirect to createItem.php
        echo "<script>window.location.href='show_submitted.php';</script>";
        // exit(); // Stop further execution
    } else {
        // Author does not exist in prac_item, redirect to item.php
        echo "<script>window.location.href='createItem.php';</script>";
        exit(); // Stop further execution
    }
}
?>