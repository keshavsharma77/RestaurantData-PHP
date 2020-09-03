<?php
header("Content-type: application/json");
require 'menu.php';


$req = $_GET['req'] ?? null;

if ($req) {
    $jsonData = file_get_contents("restaurant.json");
    $menuList = json_decode($jsonData, true)['menu_items'];
    try {
        $restaurantData = new RestaurantDataDetails($menuList);
    } catch (Exception $th) {
        echo json_encode([$th->getMessage()]);
        return;
    }
}

switch ($req) {
    case 'menu_name_list':
        echo $restaurantData->getmenuid();
        break;
    
    case 'menuName':
        $id=$_GET['id'] ?? null;
        echo $restaurantData->getMenuDetails($id);
        break;

    default:
        echo json_encode(["In-valid request"]);
        break;
}

?>