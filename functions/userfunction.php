<?php

session_start();
include('config/dbcon.php');


function getAll($table)
{

    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con ,$query);
}

function getAllActive($table)
{

    global $con;
    $query = "SELECT * FROM $table WHERE status='0' ";
    return $query_run = mysqli_query($con ,$query);
}


function getAllTrending()
{

    global $con;
    $query = "SELECT * FROM products WHERE trending='1' ";
    return $query_run = mysqli_query($con ,$query);
}


function getslugActive($table, $slug)
{

    global $con;
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status='0'LIMIT 1 ";
    return $query_run = mysqli_query($con ,$query);
}

function getProductByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id='$category_id' AND status='0' ";
    return $query_run = mysqli_query($con ,$query);
}

function getByIDActive($table, $id)
{

    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='0' ";
    return $query_run = mysqli_query($con ,$query);
}

function getcartItems()
{
    global $con;
    $user_Id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id,c.prod_qty , p.id as pid , p.name , p.image, p.selling_price 
        FROM carts c, products p   WHERE c.prod_id=p.id AND c.user_id='$user_Id' ORDER BY c.id DESC ";
        return $query_run = mysqli_query($con ,$query);
}


function redirect($url , $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit(0);
}

// Function to get all feedback data from the database
function getAllFeedback()
{
    global $con;
    $query = "SELECT * FROM feedback";
    return mysqli_query($con, $query);
}




?>