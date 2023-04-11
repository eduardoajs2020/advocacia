<head>
        <?php 
            require_once("templates/header.php");
        ?>
</head>
<body>
    <div id="principal-container">
        <?php
            session_start();
            session_destroy();
            header("Location: index.php");
        ?>
    </div>
</body>
<footer>
        <?php 
            require_once("templates/header.php");
        ?>
</footer>



