
<?php
use Bitm\Product;
$_product = new Product();
$products= $_product->getActiveProduct();

?>

<section id="best-sellers" class="mt-2">
    <div class="container">
        <div class="d-flex justify-content-between best-seller">
            <h1>BEST <span>SELLERS</span></h1>
            <div>
                <button type="button" class="btn btn-light"><i class="fas fa-angle-left"></i></button>
                <button type="button" class="btn btn-light"><i class="fas fa-angle-right"></i></button>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-4 g-4 text-center">
        <?php
               $_active = 'active';
               foreach($products as $product):
               ?>
            <div class="col">
            
                <div class="card <?=$_active;?>">
                    <a href="product-detail.html"><img src="<?=$webroot;?>uploads/<?=$product['picture'];?>" class="card-img-top" alt="BEST SELLERS Image" title="Grandpa Rocking Chair"></a>
                    <div class="card-body">
                        <h5 class="card-title" title="Grandpa Rocking Chair"> <a href="product-detail.html">Grandpa Rocking Chair</a></h5>
                       
                        <p class="card-text"><i class="fas fa-star  fa-xs"></i> <i class="fas fa-star fa-xs"></i> <i class="fas fa-star fa-xs"></i> <i class="fas fa-star fa-xs"></i> <i class="fas fa-star fa-xs"></i></p>
                        <p>&dollar;100</p>
                        <p><button type="button" class="btn btn-danger">Add to cart</button></p>
                        
                    </div>
                    
                  
         
           
                </div>
               
            </div>
            <?php
                        $_active = '';
                     endforeach;
                    ?>
            </div>
           
        </div>
    
</section>