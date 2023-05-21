<?php 
    include '../database/checkSession.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<title>Edit FAQs</title>
	<link rel="stylesheet" href="../css/editFAQ.css">
</head>
    <body>
        <div class="header_div">
            <a class="backbtn" href="../pages/system.php"> <- Back</a>
            <header>
                <h1>Edit FAQs</h1>
                <hr>
            </header>
        </div>

        <div class="box">
            <section class="currentFAQ">
                <?php 

                    $stmt = $db->prepare('SELECT * FROM FAQ');
                    $stmt->execute();
                    
                    while($result = $stmt -> fetch()){
                        echo '<span class="question">'.$result['question'].'</span>';
                    }
                ?>
            </section>

            <div class="addFAQs">
                <input type="button" id="addFAQ" value="Add FAQ"/>
                <script src="../javascript/add_faq.js"></script>
            </div>

            <div class="removeFAQ">
                <form action="../database/removeFAQ.php" method="post">
                    <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']; ?>">
                    
                    <select id="faq" name="faq">
                        <option value="none">---</option>
                        <?php include '../database/fetchFAQComments.php' ?>
                    </select>
                    <button type="submit" id="removeFAQbtn">Remove</button>
                </form> 
            </div>
        </div>
    </body>
</html>