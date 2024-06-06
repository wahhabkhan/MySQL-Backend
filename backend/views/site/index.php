<?php
use yii\grid\GridView;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamics 360</title>
     <!-- Include jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
    <style>
        .welcome-heading {
            opacity: 0;
            text-align: center;
            /* margin-top: 1em; */
            font-weight: bold;
            transition: opacity 1s ease-in-out;
        }
    </style>
</head>

<body>
    <!-- Add a container for the heading -->
    <div id="heading-container">
        <h2 class="welcome-heading text-success">Welcome to Dynamics 360 Admin Portal</h2>
    </div>

</body>

<script>
    $(document).ready(function() {
        // Animate the opacity of the welcome message when the document is ready
        $('.welcome-heading').animate({ opacity: 1 }, 1000);
    });
</script>

</html>
