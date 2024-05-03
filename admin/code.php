<?php

include('dbcon.php');
include('myfunctions.php');

if(isset($_POST['add_category_btn']))
{
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $status = isset($_POST['status']) ? '1':'0';

    $path = "../upload/images";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $cate_query = "INSERT INTO categories (name,image,status) VALUES ('$name','$filename','$status')";

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        redirect("add-category.php", "Category Added Successfully");
    }
    else
    {
        redirect("add-category.php", "Something Went Wrong");
    }

}
else if(isset($_POST['update_category_btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $new_image = $_FILES['image']['name'];
    $status = isset($_POST['status']) ? '1':'0';

    $old_image = $_POST['old-image'];

    $path = "../upload/images";

    if($new_image != "")
    {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;  
    }
    else
    {
        $update_filename = $old_image;
    }

    $update_query = "UPDATE categories SET name='$name', image='$update_filename', status='$status' WHERE id='$category_id' ";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../upload/images/".$old_image))
            {
                unlink("../upload/images/".$old_image);
            }
        }
        redirect("edit-category.php?id=$category_id", "Category updated successfully");
    }
    else
    {
        redirect("edit-category.php?id=$category_id", "Something went wrong");
    }
}
else if(isset($_POST['delete_category_btn']))
{
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id' ";
    $category_query_run = mysqli_query($con,$category_query);
    $category_data = mysqli_fetch_array($category_query_run);

    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id' ";
    $delete_query_run = mysqli_query($con,$delete_query);

    if($delete_query_run)
    {
        if(file_exists("../upload/images/".$image))
        {
            unlink("../upload/images/".$image);
        }
        // redirect("category.php?id=$category_id", "Category deleted successfully");
        echo 200;
    }
    else
    {
        // redirect("category.php?id=$category_id", "Something went wrong");
        echo 500;
    }
}

if(isset($_POST['add_brand_btn']))
{
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $status = isset($_POST['status']) ? '1':'0';

    $path = "../upload/images";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $brand_query = "INSERT INTO brands (name,image,status) VALUES ('$name','$filename','$status')";

    $brand_query_run = mysqli_query($con, $brand_query);

    if($brand_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        redirect("add-brand.php", "Brand Added Successfully");
    }
    else
    {
        redirect("add-brand.php", "Something Went Wrong");
    }

}
else if(isset($_POST['update_brand_btn']))
{
    $brand_id = $_POST['brand_id'];
    $name = $_POST['name'];
    $new_image = $_FILES['image']['name'];
    $status = isset($_POST['status']) ? '1':'0';

    $old_image = $_POST['old-image'];

    $path = "../upload/images";

    if($new_image != "")
    {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;  
    }
    else
    {
        $update_filename = $old_image;
    }

    $update_query = "UPDATE brands SET name='$name', image='$update_filename', status='$status' WHERE id='$brand_id' ";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../upload/images/".$old_image))
            {
                unlink("../upload/images/".$old_image);
            }
        }
        redirect("edit-brand.php?id=$brand_id", "Brand updated successfully");
    }
    else
    {
        redirect("edit-brand.php?id=$brand_id", "Something went wrong");
    }
}
else if(isset($_POST['delete_brand_btn']))
{
    $brand_id = mysqli_real_escape_string($con, $_POST['brand_id']);

    $brand_query = "SELECT * FROM brands WHERE id='$brand_id' ";
    $brand_query_run = mysqli_query($con,$brand_query);
    $brand_data = mysqli_fetch_array($brand_query_run);

    $image = $brand_data['image'];

    $delete_query = "DELETE FROM brands WHERE id='$brand_id' ";
    $delete_query_run = mysqli_query($con,$delete_query);

    if($delete_query_run)
    {
        if(file_exists("../upload/images/".$image))
        {
            unlink("../upload/images/".$image);
        }
        // redirect("category.php?id=$category_id", "Category deleted successfully");
        echo 200;
    }
    else
    {
        // redirect("category.php?id=$category_id", "Something went wrong");
        echo 500;
    }
}

else if(isset($_POST['add_product_btn']))
{
    $name = $_POST['name'];
    $img = $_FILES['img']['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $type = $_POST['type'];
    $status = isset($_POST['status']) ? '1':'0';

    $path = "../upload/images";

    $img_ext = pathinfo($img, PATHINFO_EXTENSION);
    $filename = time().'.'.$img_ext;

    if($name != "" && $img != "" && $description != "" && $price != "" && $sale != "" && $category_id != "" && $brand_id != "")
    {
        $product_query = "INSERT INTO `products` (name, img, description, price, sale, category_id, brand_id, status, type) 
        VALUES ('$name','$filename','$description','$price','$sale','$category_id','$brand_id','$status','$type') ";

        $product_query_run = mysqli_query($con, $product_query);

        if($product_query_run)
        {
            move_uploaded_file($_FILES['img']['tmp_name'], $path.'/'.$filename);

            redirect("add-product.php", "Product Added Successfully");
        }
        else
        {
            redirect("add-product.php", "Something went wrong");
        }
    }
    else
    {
        redirect("add-product.php", "All fields are mandatory");
    }
}
else if(isset($_POST['update_product_btn']))
{
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $type = $_POST['type'];
    $status = isset($_POST['status']) ? '1':'0';

    $path = "../upload/images";

    $new_img = $_FILES['img']['name'];
    $old_img = $_POST['old-img'];

    if($new_img != "")
    {
        //$update_filename = $new_image;
        $img_ext = pathinfo($new_img, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$img_ext;
    }
    else
    {
        $update_filename = $old_img;
    }

    $update_product_query = "UPDATE products SET name='$name', img='$update_filename', description='$description', price='$price',
    sale='$sale', category_id='$category_id', brand_id='$brand_id', status='$status', type='$type' WHERE id='$product_id'";

    $update_product_query_run = mysqli_query($con, $update_product_query);

    if($update_product_query_run)
    {
        if($_FILES['img']['name'] != "")
        {
            move_uploaded_file($_FILES['img']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../upload/images/".$old_img))
            {
                unlink("../upload/images/".$old_img);
            }
        }
        redirect("edit-product.php?id=$product_id", "Product updated successfully");
    }
    else
    {
        redirect("edit-product.php?id=$product_id", "Something went wrong");
    }
}
else if(isset($_POST['delete_product_btn']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id' ";
    $product_query_run = mysqli_query($con,$product_query);
    $product_data = mysqli_fetch_array($product_query_run);

    $image = $product_data['img'];

    $delete_query = "DELETE FROM products WHERE id='$product_id' ";
    $delete_query_run = mysqli_query($con,$delete_query);

    if($delete_query_run)
    {
        if(file_exists("../upload/images/".$image))
        {
            unlink("../upload/images/".$image);
        }
        // redirect("products.php?id=$category_id", "Category deleted successfully");
        echo 200;
    }
    else
    {
        // redirect("products.php?id=$category_id", "Something went wrong");
        echo 500;
    }
}
else if(isset($_POST['add_product_sizes_btn']))
{
    $product_id = $_POST['product_id'];
    $size_id = $_POST['size_id'];
    $quantity = $_POST['quantity'];
    
    // Establish database connection (assuming existing $con variable)
    // ... connect to database ...
    
    $path = "../upload/images"; // Assuming path for image uploads
    
    // Check if product size already exists for this product
    $check_existing_query = "SELECT quantity FROM `products_size` WHERE product_id = ? AND size_id = ?";
    
    $stmt = mysqli_prepare($con, $check_existing_query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ii", $product_id, $size_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $existing_quantity = (int) $row['quantity']; // Ensure integer conversion
    
            // Update existing quantity if product size already exists
            $updated_quantity = $existing_quantity + $quantity;
    
            $update_query = "UPDATE `products_size` SET quantity = ? WHERE product_id = ? AND size_id = ?";
            $update_stmt = mysqli_prepare($con, $update_query);
    
            if ($update_stmt) {
                mysqli_stmt_bind_param($update_stmt, "iii", $updated_quantity, $product_id, $size_id);
                mysqli_stmt_execute($update_stmt);
    
                mysqli_stmt_close($update_stmt);
                $message = "Product size quantity updated successfully!";
            } else {
                $message = "Error updating product size quantity: " . mysqli_error($con);
            }
        } else {
            // Insert new product size if it doesn't exist
            $product_sizes_query = "INSERT INTO `products_size` (product_id, size_id, quantity)
                                    VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($con, $product_sizes_query);
    
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "iii", $product_id, $size_id, $quantity);
                mysqli_stmt_execute($stmt);
    
                mysqli_stmt_close($stmt);
                $message = "Product size added successfully!";
            } else {
                $message = "Error adding product size: " . mysqli_error($con);
            }
        }
    } else {
        $message = "Error preparing statement for size check: " . mysqli_error($con);
    }
    
    // Handle redirection or other actions based on $message
    redirect("add-product-sizes.php", $message);
    
    // ... (close database connection if needed)
}
else if(isset($_POST['update_product_sizes_btn']))
{
    $product_id = $_POST['product_id'];
    $size_id = $_POST['size_id'];
    $quantity = $_POST['quantity'];

    $update_product_sizes_query = "UPDATE products_size SET product_id='$product_id', size_id='$size_id', quantity='$quantity'
    WHERE product_id='$product_id' AND size_id='$size_id'";

    $update_product_sizes_query_run = mysqli_query($con, $update_product_sizes_query);

    if($update_product_sizes_query_run)
    {
        redirect("edit-product-sizes.php?pid=$product_id?sid=$size_id", "Product updated successfully");
    }
    else
    {
        redirect("edit-product-sizes.php?pid=$product_id?sid=$size_id", "Something went wrong");
    }
}
else if(isset($_POST['update_order_btn']))
{
    $order_id = $_POST['id'];
    $order_status = $_POST['order_status'];
    
    $updateOrder_query = "UPDATE `order` SET `id_order_status`='$order_status' WHERE `id`='$order_id' ";

    $updateOrder_query_run = mysqli_query($con, $updateOrder_query);

    redirect("view-order.php?id=$order_id", "Order status updated succesfully!");
}
else if(isset($_POST['delete_product_sizes_btn']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $size_id = mysqli_real_escape_string($con, $_POST['size_id']);

    $product_sizes_query = "SELECT * FROM products_size WHERE product_id='$product_id' AND size_id='$size_id' ";
    $product_sizes_query_run = mysqli_query($con,$product_sizes_query);
    $product_sizes_data = mysqli_fetch_array($product_sizes_query_run);

    $delete_query = "DELETE FROM products_size WHERE product_id='$product_id' AND size_id='$size_id' ";
    $delete_query_run = mysqli_query($con,$delete_query);

    if($delete_query_run)
    {
        // redirect("products.php?id=$category_id", "Category deleted successfully");
        echo 200;
    }
    else
    {
        // redirect("products.php?id=$category_id", "Something went wrong");
        echo 500;
    }
}
else{
    header('Location: ../index.php');
}

?>