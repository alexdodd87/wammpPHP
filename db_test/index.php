<?php require_once('db_connect.php');

    // put database handler into a var for easier access
    $con = new db();
    $con = $con->dbh();

    var_dump($con);
try{
    // select users table
    $user_id = 0;

    // create string of sql query
    $sql = "SELECT * FROM users WHERE id != :user_id";
    // tell pdo and sql we're going to prepare a query
    $stmt = $con->prepare($sql);
    // bind param replaces parameter within sql query with a sanitised value

    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    // execute
    $stmt->execute();

    // $result = $stmt->fetch(PDO::FETCH_ASSOC);
   /* while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        var_dump($result);
    }*/

}catch(PDOException $e){
    var_dump($e);
}

// create empty array
$pages = [];

$output = "";

// loop through the data and assign date to $result
while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pages[] = $result;

    // dynamically generate rows/columns into output variable
    $output .= "<tr>";
    foreach($result as $key => $value){
        $output .= "<td>" . $value . '</td>';
    }
    $output .= "</tr>";
}


// var_dump($pages);

?>

<div class="content">

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
        </tr>
        <tr>
            <?php foreach($pages as $page) { ?>
                <tr>
                  <td><?php echo $page['id']; ?></td>
                  <td><?php echo $page['user_name']; ?></td>
                  <td><?php echo $page['created']; ?></td>
                 </tr>
             <?php } ?>
        </tr>
    </table>

    <table>
            <tr>
                <th>Key pointer number</th>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            <tr>
                <?php foreach($pages as $key => $value) { ?>

                    <tr>
                      <td><?php echo $key; ?></td>
                      <td><?php echo $value['id']; ?></td>
                      <td><?php echo $value['user_name']; ?></td>
                      <td><?php echo $value['created']; ?></td>
                     </tr>
                 <?php } ?>
            </tr>
        </table>
</div>
<hr />

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Created</th>
</tr>
<?php echo $output; ?>
</table>