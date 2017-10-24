<?php require_once('../../../private/initialize.php'); ?>

<?php

    $id = isset($_GET['id']) ? $_GET['id'] : '1';

    // $id = $_GET['id'] ?? '1'; // PHP > 7.0 (null coalescing operator)

?>

<?php $page_title = 'Show Subjects'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">
    &laquo Back to list</a>

    <div class="page show">

     Page ID: <?php echo h($id); ?>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>