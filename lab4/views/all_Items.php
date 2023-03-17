<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <title>Products</title>
</head>
<body>
    

    <div class="container mt-5 d-flex flex-column justify-content-between align-items-center">
    <table class="table table-hover">

    <thead>
            <tr>
                <th scope='col'>Id</th>   
                <th scope='col'>Name</th>   
                <th scope='col'>image</th>  
                <th scope='col'>Description</th>   


            </tr>
        </thead>

        <tbody class="table-hover">
            <?php
            
            $items=json_decode(json_encode(get_all_items("items",$page_number*__RECORDS_PER_PAGE__)),true);

            foreach($items as $item){
                
             echo   "<tr><td scope='col'>{$item["id"]}</td> ";
             echo   "<td scope='col'>{$item["product_name"]}</td> " ; 
             echo   "<td scope='col'><img src='assets/images/".str_replace(".","tz.",$item["photo"])."'></td> ";
             echo  " <td scope='col'><a href='".$_SERVER["PHP_SELF"]."?page=items&id=".$item["id"]."'>show more</a></td></tr>" ;


            
            }
            
            
            ?>


        </tbody>


        </table>
    <nav aria-label="Page navigation example ">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="<?php echo $_SERVER["PHP_SELF"]."?page=items&page_number=".$prev;?>">Previous</a></li>
            <?php 
            for($i=0 ;$i<intval($items_count/__RECORDS_PER_PAGE__)+1;$i++){
                echo "<li class='page-item'><a class='page-link' href=".$_SERVER["PHP_SELF"]."?page=items&page_number=".$i.">".$i+1.;"</a></li>";
            }
            ?>
            <li class="page-item"><a class="page-link" href="<?php echo $_SERVER["PHP_SELF"]."?page=items&page_number=".$next;?>">Next</a></li>
        </ul>
        </nav>
    </div>




</body>
</html>