<?php

class RestaurantDataDetails {
    
    private $restaurantList;

    function __construct(array $restaurantList) {
        if (sizeof($restaurantList)>0) {
            $this->restaurantList = $restaurantList;
        } else {
            throw new Exception("Records are not available for Menu");
        }
    }

    public function getmenuid() {
        $menuNameList = [];

        foreach($this->restaurantList as $restaurant) {
            $restaurantNameList[] = array(
                "id"=>$restaurant['id']
            );
        }

        return json_encode($restaurantNameList);
    }

    public function getMenuDetails($id){
        $response=["Invalid choice"];
        if($id){
            foreach($this->restaurantList as $restaurant)
            {
                
                if($id == $restaurant['id'])
                {
                    $response=$restaurant;
                    break;
                }
            }
        }
        return json_encode($response);
    }

    
}
?>