<?php require_once("../../../private/initialize.php") ?>
<?php require_teacher_login(); ?>
<?php
?>
<?php require_once(SHARED_PATH . "/teacher_header.php");?>
<style>

        #target{
            margin-top: 1em;
            min-height: 100vh;
        }

</style>

<div class="container">
    <div>
        <div class="row align-items-center">

            <div class="form-group col-sm-6">
                <input id="libraryid" class="form-control" type="text" placeholder="Student Library ID">
            </div>

        <div class="form-group col-sm-6">
            <button class="btn btn-secondary" id="find">Find Student</button>
        </div>

        </div>
    </div>

</div>

<div id="target" class="container">

</div>

<script>
    var target = document.getElementById("target");
    var btn = document.getElementById("find");
    var libraryid = document.getElementById("libraryid");


    function show_profile() {
        var url = "<?php echo url_for("/accounts_api/student_profile.php?id=") ?>" + libraryid.value;
        var xhr = new XMLHttpRequest();
        xhr.open("GET",url,true);
        xhr.onreadystatechange = function () {
            if(xhr.readyState < 4){
                target.innerHTML="<div class=\"row ml-4\"><div clas=\"col\"><div class=\"spinner-border align-self-center\" style=\"width: 3rem; height: 3rem;\" role=\"status\">\n" +
                    "  <span class=\"sr-only\">Loading...</span>\n" +
                    "</div></div><h3 class='font-weight-light col align-self-center'>Please Wait ...</h3></div>";
            }
            if(xhr.readyState == 4 && xhr.status == 200){
                target.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
    btn.addEventListener("click", show_profile);



</script>

<?php require_once(SHARED_PATH . "/public_footer.php");?>

