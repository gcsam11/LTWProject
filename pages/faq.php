<?php
    include '../database/checkSession.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<title>FAQ's</title>
	<link rel="stylesheet" href="../css/faq.css">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Source+Code+Pro&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
</head>
<body>
    <div class="header_div">
        <a class="backbtn" href="../pages/my_tickets.php"> <- Back</a>
        <header>
            <h1>Frequently Asked Questions</h1>
            <hr>
        </header>
    </div>
    
    <div class="faq">
        <section class="faq_content">
            <div class="faqcode">
                <?php include '../database/getFAQ.php'; ?>
            </div>



            <?php if($_SESSION['type'] = 'Admin'){
                echo '<div class="box_btn">
                <input type="button" id="addbtn" value="+"/>
                <script src="../javascript/faq.js"></script>
                </div>';
            }?>
        </section>
    </div>
</body>
</html>
