<?php require_once ('inc/header.php'); ?>

        <div class="container py-5">
             <!-- print massage of register validation -->
              <?=show_message();?>

            <h2 class="text-center">Login</h2>
            <form action="..\pms-front\handelers\login_handler.php" method="POST" class="pb-5 mb-5">
               
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control mb-5" id="email" name="email"  />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control mb-5" id="password" name="password"  />
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>

        <!-- Footer-->
        <?php require_once ('inc/footer.php'); ?>