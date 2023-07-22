<?php
require("./stripe-php-master/init.php");

$Publishablekey=
"
pk_test_51NWFVkLJ55CMNpsz1S6OSIXd4TBlls2X6Lck5Wuwaa21MHNU7me6oHDtAWjSPBcLgYEbzBLWFYj6JUa6DXqs6bAu00hHyfKr8Z";

$Secretkey="

sk_test_51NWFVkLJ55CMNpszfd8xpYiK1tirOtKAGXX5e5lCCK4DgttUr7p6hxtbuHcK9sCjzocmpGd6aAnPhxGUokUWdlpw00FKIn8C9Q";

\Stripe\Stripe::setApiKey($Secretkey);


?>