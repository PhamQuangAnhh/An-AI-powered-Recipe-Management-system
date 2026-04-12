<?php include('includes/dbconnection.php');
include('includes/ai-helper.php');

if(isset($_POST['submit'])) {
    $fname=$_POST['fname'];
    $emailid=$_POST['emailid'];
    $message=$_POST['message'];
    $recipeid=isset($_GET['rid']) ? intval($_GET['rid']) : 0;
    $query=mysqli_query($con, "insert into comments(recipeId,userName,userEmail,commentMessage) value('$recipeid','$fname','$emailid','$message')");
    if ($query) {
        echo "<script>alert('Comment added successfully. After moderation it will show');</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Recipe details on Food Recipe System">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Food Recipe System | Recipe Details</title>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/modern.css">
</head>
<body>
<?php include_once('includes/topbar.php');?>
<?php include_once('includes/header.php');?>

<?php
$recipeid = isset($_GET['rid']) ? intval($_GET['rid']) : 0;
$ret = mysqli_query($con, "SELECT * FROM recipes WHERE id='$recipeid'");
while ($row = mysqli_fetch_array($ret)) {
    // Load ingredients từ bảng mới
    $ingredients = loadRecipeIngredients($con, $recipeid);
?>
    <!-- Page Header with Recipe Image -->
    <section class="page-header-section page-header-tall" style="background-image: url(user/images/<?php echo $row['recipePicture'];?>);">
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content">
                <span class="page-tag">Recipe</span>
                <h1><?php echo htmlspecialchars($row['recipeTitle']);?></h1>
                <div class="recipe-detail-meta">
                    <span>📅 <?php echo $row['postingDate'];?></span>
                    <?php if($row['recipePrepTime']) { ?><span>⏱️ Prep: <?php echo $row['recipePrepTime'];?> min</span><?php } ?>
                    <?php if($row['recipeCookTime']) { ?><span>🍳 Cook: <?php echo $row['recipeCookTime'];?> min</span><?php } ?>
                    <?php if($row['recipeYields']) { ?><span>🍽️ Yields: <?php echo $row['recipeYields'];?> servings</span><?php } ?>
                    <?php if($row['totalCalories'] > 0) { ?>
                    <span class="calorie-badge">🔥 <?php echo $row['totalCalories'];?> cal</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Recipe Content -->
    <section class="recipe-detail-section">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-12 col-lg-8">
                    <div class="recipe-detail-card">
                        <h3>Description</h3>
                        <div class="recipe-description">
                            <?php echo $row['recipeDescription'];?>
                        </div>
                    </div>
                </div>

                <!-- Sidebar - Ingredients -->
                <div class="col-12 col-lg-4">
                    <div class="recipe-detail-card ingredients-card">
                        <h3>🥘 Ingredients</h3>
                        <?php if($row['totalCalories'] > 0): ?>
                        <div class="calorie-summary">
                            <span class="calorie-total">🔥 <?php echo $row['totalCalories'];?> calories</span>
                            <small class="text-muted">estimated total</small>
                        </div>
                        <?php endif; ?>
                        <ul class="ingredients-list">
<?php
foreach ($ingredients as $ing) {
    $displayText = '';
    if (!empty($ing['quantityOriginal'])) {
        $displayText = $ing['quantityOriginal'] . ' ' . $ing['name'];
    } else {
        $displayText = $ing['name'];
    }
    // Show grams conversion if available
    $gramsNote = '';
    if ($ing['quantityGrams'] > 0) {
        $unit = $ing['standardUnit'] ?: 'g';
        $gramsNote = ' (' . round($ing['quantityGrams'], 1) . $unit . ')';
    }
?>
                            <li>
                                <label class="ingredient-check">
                                    <input type="checkbox">
                                    <span><?php echo htmlspecialchars($displayText);?><?php if($gramsNote): ?><small class="text-muted"><?php echo $gramsNote; ?></small><?php endif; ?></span>
                                </label>
                            </li>
<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
<?php } ?>

            <!-- Comments Section -->
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="recipe-detail-card">
                        <h3>💬 Leave a Comment</h3>
                        <form method="post" class="modern-form">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group-modern">
                                        <input type="text" name="fname" placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group-modern">
                                        <input type="email" name="emailid" placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group-modern">
                                        <textarea name="message" rows="5" placeholder="Write your comment..." required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn-modern btn-primary-modern">Post Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Existing Comments -->
<?php
$ret = mysqli_query($con, "SELECT userName, commentMessage, postingDate FROM comments WHERE status=1 AND recipeId='$recipeid'");
while ($row = mysqli_fetch_array($ret)) {
?>
                    <div class="comment-card">
                        <div class="comment-header">
                            <strong><?php echo htmlspecialchars($row['userName']);?></strong>
                            <span class="comment-date"><?php echo $row['postingDate'];?></span>
                        </div>
                        <p><?php echo htmlspecialchars($row['commentMessage']);?></p>
                    </div>
<?php } ?>
                </div>
            </div>
        </div>
    </section>

<?php include_once('includes/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>