<?php
    require_once("dbcontroller.php");

    $db_handle = new DBController();

    if(!empty($_POST["bound_id"])){
        $query = "SELECT * FROM departure WHERE boundID = '" . $_POST["bound_id"] . "' order by name asc";
        $results = $db_handle->runQuery($query);
        ?>

<option value disabled selected> Select Departure Station</option>
<?php
    foreach ($results as $departure) {
        ?>
<option value="<?php echo $departure["id"]; ?>"><?php echo $departure["departure_station"];?></option>
<?php
    }
}
?>

