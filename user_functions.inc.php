<?php 

function get_categories($con)
{
    $sql = "SELECT * FROM `tbl_category`";
    $run = mysqli_query($con,$sql);

    $output = array();

    if(mysqli_num_rows($run) > 0)
    {
        foreach($run as $list)
        {
            $output[] = $list;
        }
        return $output;
    }
    else
    {
        return "NO DATA FOUND";
    }
}
function search_categories($con)
{
    $sql = "SELECT * FROM `tbl_category`";
    $run = mysqli_query($con,$sql);
    return $run;
}


function get_category_title($con,$category_id)
{
    $sql = "SELECT category_title FROM `tbl_category` WHERE category_id='$category_id'";
    $run = mysqli_query($con,$sql);

    $category_title = mysqli_fetch_assoc($run);
    return $category_title['category_title'];
}






?>