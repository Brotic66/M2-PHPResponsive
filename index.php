<?php
/**
 * @author Brice VICO, Théo CHAMBON
 * @date 03/12/2015
 * @version 1.0.0
 */

include_once 'Base.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <title>Notre dico</title>
</head>
<body>
<form method="post" action="index.php">
    <div class="form-group">
        <label for="terme">Terme à chercher :</label>
        <input type="text" name="terme" id="terme" />
    </div>
    <button class="btn btn-success">Chercher</button>
</form>
<?php
if ($affichage) {
?>
    <div class="row">
        Nom : <?php echo $word->getMot(); ?>
    </div>
<?php
}
?>
</body>
</html>
