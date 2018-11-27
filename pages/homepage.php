<?php

// Opens html tag, holds meta tags, title, stylesheets, creates cookies etc.
include 'components/head.php';

// Opens body tag, has navigation and other header content
include 'components/header.php';

?>

<div class="container">
    <div class="row">

        <div class="col-9">
            <?php 
                if( isset($_GET['PDF']) ) {
                    echo '<p class="error" style="color:red">There was a problem creating your business card, try again later</p>';
                }
            ?>
            <form id="businessCardForm" enctype="multipart/form-data" method="POST" action="core/src/helpers/formHandler.php"  >

                <div class="form-group">
                    <label for="fname">First name</label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter first name" required>
                </div>

                <div class="form-group">
                    <label for="lname">Last name</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter last name" required>
                </div>

                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" name="company" id="company" placeholder="Enter company name" required>
                </div>

                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" name="position" id="position" placeholder="Enter your position in the company" required>
                </div>

                <div class="form-group">
                    <label for="phoneNum">Phone number</label>
                    <input type="text" class="form-control" name="phoneNum" id="phoneNum" placeholder="Enter phone number" required>
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                    <label for="baseColor">Select base color</label>
                    <select class="form-control" id="baseColor" name="baseColor" required>
                        <option value="#FF4775">Red</option>
                        <option value="#82aa9a">Green</option>
                        <option value="#0099CC">Blue</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cardImage">Uplaod image</label>
                    <input type="file" class="form-control-file" id="cardImage" name="cardImage" accept="image/*" required>
                </div>

                <br>
                <button type="submit" class="btn btn-primary" id="btnSubmit">Create Card</button>

            </form>
        </div>

    </div>
</div>



<?php

// Closes body, html tags, scripts and holds footer content
include 'components/footer.php';

?>