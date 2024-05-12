<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="cart_page_bg">
    <div class="container">

        <?php if (!empty($listProductInCart)): ?>
            <div class="shopping_cart_area">
                <form action="#">
                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="cart_page">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product_thumb">Image</th>
                                                <th class="product_name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product_quantity">Quantity</th>
                                                <th class="product_total">Total</th>
                                                <th class="product_remove">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($listProductInCart as $item) {
                                                extract($item);
                                                $product = getProductDetail($productid);
                                                if ($product) {
                                                    $productName = $product['name'];
                                                }
                                                echo '<tr>
                                                        <td class="product_thumb"><a href="#"><img src="views/layouts/assets/img/s-product/product.jpg" alt=""></a></td>
                                                        <td class="product_name"><a href="index.php?page=product-detail&id=' . $productid . '">' . $productName . '</a></td>
                                                        <td class="product-price">£' . $price . '</td>
                                                        <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="' . $quantity . '" type="number"></td>
                                                        <td class="product_total">£' . $total . '</td>
                                                        <td class="product_remove"><a href="index.php?page=deleteProductCart&id=' . $id . '"><i class="fa fa-trash-o"></i></a></td>
                                                    </tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area start-->
                    <div class="coupon_area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code left">
                                    <h3>Coupon</h3>
                                    <div class="coupon_inner">
                                        <p>Enter your coupon code if you have one.</p>
                                        <input placeholder="Coupon code" type="text">
                                        <button type="submit">Apply coupon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">

                                <?php
                                $totalPrice = 0; // Khởi tạo biến tổng số tiền
                                foreach ($listProductInCart as $item) {
                                    extract($item);
                                    $totalPrice += $price * $quantity; // Tính tổng số tiền bằng cách nhân giá của sản phẩm với số lượng và cộng vào tổng số tiền
                                }

                                echo '<div class="coupon_code right">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">£0</p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Shipping</p>
                                    <p class="cart_amount"><span>Flat Rate:</span> £0</p>
                                </div>
                                <a href="#">Calculate shipping</a>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">£' . $totalPrice . '</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="#">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area end-->
                </form>
            </div>
        <?php else: ?>
            <div class="shopping_cart_area d-flex flex-column align-items-center justify-content-center">
                <img src="views/layouts/assets/img/icon/cartNull.png" alt="">
                <h3 class="text-center rubik-sans_serif">Giỏ hàng của bạn còn trống</h3>
                <a href="index.php?page=shop" class="btn-buy-now mt-3">Mua ngay</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<!--shopping cart area end -->