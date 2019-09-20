<?php require_once("../../../private/initialize.php"); ?>

<?php $users = User::find_all(); ?>
<?php function get_acc_type($level){
    $account_type = "";
    switch ($level) {
        case 1:
            $account_type = "Admin Account";
            break;
        case 2 :
            $account_type = "Teacher Account";
            break;
        case 3:
            $account_type = "Student Account";
    }
    return $account_type;
}
?>

<?php require_once(SHARED_PATH . "/admin_header.php");?>

    <style>
        .card{
            margin: 1em 0;
        }
    </style>
    <div class="container">
        <h1 class="display-3 text-primary text-center mb-4">
            Manage Users
        </h1>

        <?php echo display_session_message(); ?>
        <a href="add_user.php" class="btn btn-primary ml-2">Add a new User</a>



        <div class="card">
            <div class="card-header" style="background: #fffee6;">
                <span class="h4">Users</span>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <th>#id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Acc. Type</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Actions</th>
                    </thead>

                    <?php foreach ($users as $user){ ?>

                        <tr>
                            <td><?php echo $user->id ?></td>
                            <td><?php echo $user->full_name(); ?></td>
                            <td><?php echo $user->gender ?></td>
                            <td><?php echo get_acc_type($user->level); ?></td>
                            <td><?php echo $user->course ?? "N/A"; ?></td>
                            <td><?php echo $user->course ?? "N/A"; ?></td>
                            <td><?php echo $user->phone ?? "N/A"; ?></td>
                            <td><?php echo $user->email ?? "N/A"; ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm mb-2" href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
                                <a class="btn btn-danger btn-sm disabled" href="#">Delete</a>
                            </td>
                        </tr>

                    <?php } ?>


                </table>
            </div>
        </div>

    </div>


<?php require_once(SHARED_PATH . "/public_footer.php");?><?php
