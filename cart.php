<?php require_once('inc/header.php'); ?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
           

            <?php 
           

            if(isset($_SESSION['cart'])){
                $cart=[];
            $cart=$_SESSION['cart'];
            }
         
            
         if(!empty($cart)){
            
        
        $quantity=product_Quantity($cart);
           
            
 
        $total_price=cal_total($cart,$quantity);
    
        


         } ?>

                     <?php if (!empty($cart)): ?>


                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $all_data=get_final_array( $cart, $quantity, $total_price);
                        //  new array after edit in session as pure array
                         $_SESSION["pure_array"]=$all_data;
                         $new_array= $_SESSION["pure_array"];

                         $total_price = array_sum(array_column($new_array, 'total'));

                         foreach($new_array as $index=>$item):
                           ?>
                             <tr>
                                <!-- increase index by 1 to start from 1 in table -->
                             <td><?=$index+1?></td>
                             <td><?=$item['name']?></td>
                             <td><?=$item['price']?></td>
                             <td><?=$item['Quantity']?></td>
                             <td>$<?=$item['total']?></td>
                             <td> <form action="/../329/pms-front/handelers/delet_product.php" method="post">
                            <input name="deletitem" type="hidden" value=<?= $index?>>
                            <input class="btn btn-danger" type="submit" value="Delete">
                           
                        </form></td></tr>
                         <?php endforeach;?>
                         </tbody>
                          
                         <tfoot>
                          <tr>
                            <td colspan="2">
                                Tatal Price
                            </td>
                            <td colspan="3">
                                <h3><?= $total_price?> $</h3>
                            </td>
                            <td>
                                <a href="checkout.php" class="btn btn-primary">Checkout</a>
                            </td>
                        </tr>
                        </tfoot>
                         
                          
                       


                       
                </table>

                <?php else: ?>
                    <div class="container mt-5">
                       <div class="alert alert-warning text-center">
                          <h1 class="display-4">The cart is empty</h1>
                          <p class="lead">It looks like you haven't added any products yet.</p>
                          <a href="index.php" class="btn btn-primary btn-lg">Add Product Now</a>
                        </div>
                  </div>

                    <?php  endif;?>

                  

            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>