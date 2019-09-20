<?php require_once("../../../private/initialize.php") ?>
<?php
if(is_post_request()){
    $args = $_POST['loan'];
    $loan = new Loan($args);
    $result = $loan->create();

    if($result == true){
        $_SESSION["message"] = "Book Has been Issued Successfully";
    }
}else{
    //display errors
    $loan = new Loan();
}


//DATE CALCULATIONS
$today = date("Y-m-d");
$return_timestamp = strtotime("next " . date("l"));
$return_date = date("Y-m-d", $return_timestamp);

?>

<?php require_once(SHARED_PATH . "/admin_header.php");?>

    <div class="container mb-4">
        <h1 class="display-3 mb-4 text-center text-primary">Issue Book</h1>

        <div class="card" style="margin: 0 auto; max-width: 600px">
            <div class="card-header">
                Issue Book
            </div>
            <div class="card-body">
                <?php echo display_errors($loan->errors); ?>
                <?php echo display_session_message(); ?>
                <form method="post" action="issue_book.php">

                    <div class="form-group">
                        <label class="form-label" for="category">ISBN</label>
                        <input type="text" name="loan[isbn]" id="isbnField" class="form-control" value="<?php echo $book->id ?? '' ?>" placeholder="Enter ISBN">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="category">Name of the Book</label>
                        <input type="text" id="bookname" class="form-control" placeholder="Book Name" disabled>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="category">Library ID</label>
                        <input type="text" id="usrid" name="loan[user_id]" class="form-control" placeholder="Enter Library ID No.">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="category">User's Name</label>
                        <input type="text" id="usrname" class="form-control" placeholder="Book Name" disabled>
                    </div>

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Issue Date</label>
                                <input type="date" name="loan[issue_date]" class="form-control" readonly value="<?php echo $today; ?>">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Return Date</label>
                                <input type="date" name="loan[return_date]" class="form-control" value="<?php echo $return_date; ?>">
                                <small>Return date is calculated for you.</small>
                            </div>
                        </div>
                    </div>


                        <div class="form-group text-center">
                            <input type="submit" id="submit" value="Issue Book" class="btn btn-primary" name="submit" disabled>
                        </div>


                </form>
            </div>
        </div>

    </div>

<script>
    var isbnFileld = document.getElementById("isbnField");
    var bookname = document.getElementById("bookname");
    var usrid = document.getElementById("usrid");
    var usrname = document.getElementById("usrname");
    var submitBtn = document.getElementById("submit");
    var $validBook = false;
    var validUser = false;

    var bookApi = "<?php echo url_for("/api/get_book.php?id=") ?>";
    var accountApi = "<?php echo url_for("/api/get_user.php?id=") ?>";

   function updateBookField() {
       let id = isbnFileld.value;
       let url = bookApi + id;

       var xhr = new XMLHttpRequest();
       xhr.open("GET", url, true);

       xhr.onreadystatechange = function () {
           if(xhr.readyState < 4){
               bookname.value = "Loading ...";
           }

           if(xhr.readyState == 4 && xhr.status == 200){
               if(xhr.responseText == "not found"){
                   isbnFileld.classList.add("is-invalid");
                   bookname.value="INVALID ISBN NUMBER";
                   bookname.classList.add("is-invalid");
                   validBook =false;
               }else {
                   isbnFileld.classList.remove("is-invalid");
                   isbnFileld.classList.add("is-valid");
                   bookname.classList.remove("is-invalid");
                   bookname.classList.add("is-valid");

                   bookname.value= xhr.responseText;
                   validBook = true;
                   enableSubmit();
               }
           }
       };
       xhr.send();

   }

   function updateUserField(){
       let id = usrid.value;
       let url = accountApi + id;

       var xhr = new XMLHttpRequest();
       xhr.open("GET", url, true);

       xhr.onreadystatechange = function () {
           if(xhr.readyState < 4){
               usrname.value = "Loading ...";
           }

           if(xhr.readyState == 4 && xhr.status == 200){
               if(xhr.responseText == "not found"){
                   usrid.classList.add("is-invalid");
                   usrname.value="INVALID LIBRARY ID";
                   usrname.classList.add("is-invalid");
                   validUser =false;
               }else {
                   usrid.classList.remove("is-invalid");
                   usrid.classList.add("is-valid");
                   usrname.classList.remove("is-invalid");
                   usrname.classList.add("is-valid");

                   usrname.value= xhr.responseText;
                   validUser = true;
                   enableSubmit();
               }
           }
       };
       xhr.send();
   }


    isbnFileld.addEventListener('focusout',updateBookField);
   usrid.addEventListener('focusout',updateUserField);

   function enableSubmit() {
       if(validUser && validBook){
           submitBtn.removeAttribute("disabled");
       }
   }





</script>


<?php require_once(SHARED_PATH . "/public_footer.php");?>