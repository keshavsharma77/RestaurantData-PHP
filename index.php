<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <meta charset="utf-8">
        <title>Fetch Restuarant Data using PHP</title>
        <!-- CSS only -->
        <style>  
          .container{
            align-items: center;
            justify-content: center; 
            padding: 40px 40px;
          }
          #tabl{
            display:none;
          }
          .tab{
            margin-top: 30px;
            padding-left: 40px;
          }
          .cont{
            padding-top: 30px;
            text-align: center;
      }                 
       </style>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="#" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        Restaurant Menu 
      </a>
    </nav>

    <div class="cont">
      <h1>Select the id from the options below to see its details!!!</h1>
    </div>
      <div class="container">
      <select name="item restaurant-dropdown restaurant" class="custom-select custom-select-lg mb-3" id="restaurant">
        <option value="">Select Menu</option>
    </select>
    <br>
  
    <table id="tabl" class="table table-dark tab">
      
      <tr>
        <th>ID</th>
        <td id="id"></td>
      </tr>
      <tr>
        <th>Name</th>
        <td id="menuname"></td>
      </tr>
      <tr>
        <th>Short Name</th>
        <td id="sname"></td>
      </tr>
      <tr>
        <th>Description</th>
        <td id="descp"></td>
      </tr>
      <tr>
        <th>Price Small</th>
        <td id="psmall"></td>
      </tr>
      <tr>
        <th>Price Large</th>
        <td id="plarge"></td>
      </tr>
    </table>

    </div>
        
    <footer class="page-footer font-small stylish-color-dark bg-dark pt-4" style="position:fixed; bottom:0;width: 100%;">
      <div class="footer-copyright text-center py-3" style="background:#000;">© 2020 Copyright:
              <a href="mailto:krsharma@mitaoe.ac.in">krsharma@mitaoe.ac.in</a>
      </div>
    </footer>
            
        <script src="jquery-3.5.1.min.js"></script>
        <script>
        let base_url = "http://localhost/Assignment4/datadetails.php";

        $("document").ready(function(){
            getRestaurantMenuList();
            document.querySelector("#restaurant").addEventListener("change",getMenuItemList);
        });

        function getRestaurantMenuList() {
            let url = base_url + "?req=menu_name_list";
            $.get(url,function(data,success){
                for (const key in data) {
                let opt = document.createElement("option");
                opt.textContent = data[key].id;
                opt.value = data[key].id;
                document.querySelector('#restaurant').appendChild(opt);
            }
            });
        }
            function getMenuItemList(e)
            {
                
                let id=e.target.value;
                console.log(id);
                let url=base_url + "?req=menuName&id="+id;
                $.get(url,function(data,success){
                        if(data != null){
                        console.log(data);
                        let x = data;

                        let pricesmall = x.price_small;
                        
                        if(pricesmall == null){
                            pricesmall = "Not available";
                        }
                        let descrp = x.description;
                        if(descrp == ""){
                            descrp = "Description not available";
                        }
                        
                        document.querySelector("#menuname").textContent = x.name;
                        document.querySelector("#id").textContent = x.id;
                        document.querySelector("#sname").textContent = x.short_name;
                        document.querySelector("#descp").textContent = descrp;
                        document.querySelector("#psmall").textContent = pricesmall;
                        document.querySelector("#plarge").textContent = x.price_large;
                    }
                    document.getElementById("tabl").style.display = "block";
                });
                
            }
    </script>
    </body>
</html>
