<?php 
include_once 'order_db_connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

    <section class="container py-5">
        <h1 class="title text-center mb-4"><i>Product list</i></h1>
        <div class="row">
            
                <?php
                $itemlist = query($conn, "select item_id, item_name, item_price from products where item_status='A'");
                
                foreach($itemlist as $items => $card){
                    echo '
                    <div class="col-md-3 mt-3 mx-2">
                    <form action="./checkout.php" method="post">
                        <div class="card" key="'. $card['item_id'] . '" style="width: 18rem;">
                        <img src="../images/download.png" class="card-img-top" alt="item image">
                        <div class="card-body">
                            <h5 class="card-title">'. $card['item_name'] .'</h5>
                            <p class="card-text">'. $card['item_price'] .'</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <input type="hidden" name="item_id" value="'.$card['item_id'].'">
                            <input type="number" class="form-control w-50" name="quantity" min="1" id="quantity" value="1">    
                            <button type="submit" name="buy_now" class="btn btn-primary">Buy Now</button>
                            </div>
                        </div>
                        </div>
                        </form>
                    </div>';
                }
                
                ?>
            
                    
                
            
        </div>
    </section>

</body>
</html>
