<?php
require_once 'model/connect.php';
require_once 'model/product.php';

require_once 'views/header.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
switch ($page) {
    case 'home':
        $list_product = getProducts();
        require_once 'views/home.php';
        break;
    case 'shop':
        require_once 'views/shop.php';
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