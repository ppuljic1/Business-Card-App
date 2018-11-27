<?php

// Opens html tag, holds meta tags, title, stylesheets, creates cookies etc.
include 'components/head.php';

// Opens body tag, has navigation and other header content
include 'components/header.php';

?>

<div class="container">
    <div class="row">

        <div class="col-9">
            <br><br>
            <?php 
                if( isset($_GET['PDF']) )
                    echo "
                        <h1>Your card was successfuly created!</h1> 
                        <a href='/assets/img/cards/".$_GET["PDF"]."'>Click this link to see your business card</a>
                    ";   
               else 
                echo "<h1>No card was created</h1>";
            ?>

        </div>

    </div>
</div>
<br><br><br><br><br><br>
<?php

// Closes body, html tags, scripts and holds footer content
include 'components/footer.php';

?>