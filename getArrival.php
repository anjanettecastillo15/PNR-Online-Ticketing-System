<?php
    require_once("dbcontroller.php");

    $db_handle = new DBController();

    if(!empty($_POST["bound_id"])){
        $query = "SELECT * FROM arrival WHERE boundID = '" . $_POST["bound_id"] . "' order by name asc";
        $results = $db_handle->runQuery($query);
        ?>

<option value disabled selected> Select Arrival Station</option>
<?php
    foreach ($results as $arrival) {
        ?>
<option value="<?php echo $arrival["id"]; ?>"><?php echo $arrival["arrival_station"];?></option>
<?php
    }
}
?>

