<head>
    <?php
    require_once("templates/header.php");
    ?>

</head>


<body>

    <?php

    if($userDao){
    $userDao->destroyToken();
}
    ?>

</body>

<footer>
    <?php 
    require_once("templates/header.php");
    ?>
</footer>



