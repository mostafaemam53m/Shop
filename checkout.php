<?php require_once('inc/header.php'); ?>

<?php
// check if user login or not if not login ask hime to login or register first
if (!isset($_COOKIE["user_email"])): ?>
<!-- show page ask user login or register -->

<!-- Section for login/register notice -->
<section class="py-5 my-5 bg-light border-top border-bottom mb-5 pb-5" style="min-height: 60vh">
    <div class="container text-center">
        <h2 class="mb-4 fw-bold text-dark">You need to login or register to view this Checkout</h2>
        <a href="login.php" class="btn btn-primary mx-2 px-4 py-2">Login</a>
        <a href="register.php" class="btn btn-outline-primary mx-2 px-4 py-2">Register</a>
    </div>
</section>


<?php else: ?>

    <!-- if user already login show checkout page -->
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop homepage template</p>
            </div>
        </div>
    </header>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row">
                <div class="col-4">
                    <div class="border p-2">
                        <div class="products">
                            <ul class="list-unstyled">
                                <?php
                                if (!empty($_SESSION["pure_array"])): ?>
                                    <?php
                                    $pure_array = $_SESSION["pure_array"];
                                    $total_price = array_sum(array_column($pure_array, 'total'));

                                    foreach ($pure_array as $index => $item):
                                        ?>
                                        <li class="border p-2 my-1"> <?= $item["name"]; ?> -
                                            <span class="text-success mx-2 mr-auto bold"><?= $item["Quantity"]; ?> x <?= $item["price"]; ?>$</span>
                                        </li>
                                    <?php endforeach;
                                endif;
                                ?>
                            </ul>
                        </div>
                        <h3>Total : <?= isset($total_price) ? $total_price : 0 ?> $</h3>
                    </div>
                </div>
                <div class="col-8">
                    <form action="handelers\checkout_handeler.php" method="POST" class="form border my-2 p-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($_COOKIE['user_email']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <input type="text" name="notes" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php require_once('inc/footer.php'); ?>