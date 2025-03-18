<?php
header("Acces-Control-Allow-Origin*");
header("Content-Type:application/json");
header("Acces-Control-Allow-Methods");
header("Acces-Control-Allow-Origin,Content-Type,Acces-Control-Allow-Methods,Authorization, X-Requested-With");


include('config.php');

$requstMethod= $_SERVER['REQUEST_METHOD'];

switch ($requstMethod){
    case'GET':
        if(isset($_GET["ProductID"])){
        getProduct($_GET["ProductID"]);
         } else{
        getAllProducts();
    }
    break;

    case'POST':
        addProduct();
        break;

    case'PUT':
        if(isset($_GET["ProductID"])){
            updateProduct($_GET["ProductID"]);
        }else{
            echo json_encode(["error" => "Product ID required"]);
        }
        break;

        case 'DELETE':
            if (isset($_GET["ProductID"])) {
                deleteProduct($_GET["ProductID"]);
            } else {
                echo json_encode(["error" => "Product ID required"]);
            }
            break;
    
        default:
            echo json_encode(["error" => "Invalid Request Method"]);
            break;

    }

    function getAllProducts(){

        global $conn;
        $sql = "select * from products";
        $result =mysqli_query($conn,$sql);
        $Products=[];

        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        
        echo json_encode($products);
    }

    function getProduct($ProductID){
        global $conn;
        $sql = "select* from products where ProductID=$ProductID";
        $result =mysqli_query($conn,$sql);

        if($row = mysqli_fetch_assoc($result)){
            echo json_encode($row);

        }else{
            echo json_encode(["error" => "Product not found"]);
        }

    }

function addProduct(){
    global $conn;

    if (!empty($data["name"]) && !empty($data["category"]) && isset($data["price"]) && isset($data["stock"])) {
        $name = $data["name"];
        $category = $data["category"];
        $price = $data["price"];
        $stock = $data["stock"];


        $sql =  $sql = "INSERT INTO products (name, category, price, stock) VALUES ('$name', '$category', '$price', '$stock')";
        if(mysqli_query($conn,$sql)){
            echo json_encode(["message"=> "product added successfully"]);
        }else if(true){
            echo json_encode(["Error" => "Failed adding product"]);
        }else{
            echo json_encode(["Error" => "Some missing information"]);
        }
    }
}
function deleteProduct($ProductID)
{
    global $conn;
    $sql = "DELETE FROM products WHERE ProductID=$ProductID";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["message" => "Product deleted successfully"]);
    } else {
        echo json_encode(["error" => "Failed to delete product"]);
    }
}

function updateProduct($ProductID){
    global $conn;
    $data = json_decode(file_get_contents("php://input"), true);

    if (!empty($data["name"]) || !empty($data["category"]) || isset($data["price"]) || isset($data["stock"])) {
        $setValues = [];

        if (!empty($data["name"])) {
            $setValues[] = "name='" . $data["name"] . "'";
        }
        if (!empty($data["category"])) {
            $setValues[] = "category='" . $data["category"] . "'";
        }
        if (isset($data["price"])) {
            $setValues[] = "price=" . $data["price"];
        }
        if (isset($data["stock"])) {
            $setValues[] = "stock=" . $data["stock"];
        }
        $sql = "UPDATE products SET " . implode(", ", $setValues) . " WHERE id=$ProductID";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(["message" => "Product updated successfully"]);
        } else {
            echo json_encode(["error" => "Failed to update product"]);
        }
    } else {
        echo json_encode(["error" => "No values provided for update"]);
    }
}


?>
