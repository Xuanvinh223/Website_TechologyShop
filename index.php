<?php

require_once 'model/connect.php';
require_once 'model/product.php';
require_once 'model/cart.php';
require_once 'model/catelogy.php';


$list_catelogy = getCatelogys();
$list_product = getProducts();

require_once 'views/header.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
switch ($page) {
    case 'home':
        require_once 'views/home.php';
        break;
    case 'shop':
        if (isset($_GET['catalogy'])) {
            $catalogyValue = $_GET['catalogy'];
            $listProduct = getProductsByIdCatalogy($catalogyValue);
        } else {
            $listProduct = getProducts();
        }

        require_once 'views/shop.php';
        break;
    case 'product-detail':
        if (isset($_GET['id'])) {
            $idProductValue = $_GET['id'];
            $productDetail = getProductDetail($idProductValue);
        }
        require_once 'views/product-detail.php';
        break;
    case 'about':
        require_once 'views/about.php';
        break;
    case 'contact':
        require_once 'views/contact.php';
        break;
    case 'blog':
        require_once 'views/blog.php';
        break;
    case 'cart':
        $listProductInCart = getCarts();
        require_once 'views/cart.php';
        break;
    case 'addToCart':
        $addToCart = isset($_POST['btnAddToCart']) ? $_POST['btnAddToCart'] : null;
        if (isset($addToCart) && $addToCart) {
            $listProductInCart = getCarts();
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = 1;
            $productExists = false;
            foreach ($listProductInCart as $item) {
                if ($id == $item['productid']) {
                    $productExists = true;
                    // echo "Sản phẩm đã có trong giỏ hàng <br>";
                    break; 
                }
            }
            if (!$productExists) {
                $checkAddCart = addToCart(2, $id, $name, $price, $quantity);
                // echo "Sản phẩm đã được thêm vào giỏ hàng  <br>";
            }
            $listProductInCart = getCarts();
            require_once 'views/cart.php';
        }
    case 'deleteProductCart':
        $idCart = $_GET['id'];
        $checkDele = deleteCart($idCart);
        $listProductInCart = getCarts();
        require_once 'views/cart.php';
        break;
    case 'checkout':
        require_once 'views/checkout.php';
        break;
    case 'wishlist':
        require_once 'views/wishlist.php';
        break;
    case 'my-account':
        require_once 'views/my-account.php';
        break;
    case 'login':
        require_once 'views/login.php';
        break;
    case 'register':
        require_once 'views/register.php';
        break;
    default:
        require_once 'views/home.php';
        break;
}

require_once 'views/footer.php';