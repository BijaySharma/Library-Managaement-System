<?php require_once("../../../private/initialize.php"); ?>
<?php require_once(SHARED_PATH . "/admin_header.php");?>

<div class="container text-center">
    <div class="form-inline">
        <div class="form-group">
            <label>Book ISBN</label>
            <input type="text" id="isbn" placeholder="Book ISBN">
        </div>
        <button id="search_btn" class="btn btn-primary mb-2">Search</button>
    </div>
</div>

<?php require_once(SHARED_PATH . "/public_footer.php");?>
