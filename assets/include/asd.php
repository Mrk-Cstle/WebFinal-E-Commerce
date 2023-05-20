
                    <?php 
                    include 'session.php';
                    if (isset($_SESSION['cart'])) : ?>
                  <?php echo count($_SESSION['cart']); ?>
                    <?php endif; ?>
                    