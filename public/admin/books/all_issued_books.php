<?php require_once("../../../private/initialize.php"); ?>

<?php $loans = Loan::find_all(); ?>

<?php require_once(SHARED_PATH . "/admin_header.php");?>

    <style>
        .card{
            margin: 1em 0;
        }
    </style>
    <div class="container">
        <h1 class="display-3 text-primary text-center mb-4">
           Issued Books
        </h1>

        <?php echo display_session_message(); ?>
        <a href="issue_book.php" class="btn btn-primary ml-2">Issue a book</a>



        <div class="card">
            <div class="card-header" style="background: #fffee6;">
                <span class="h4">All Issued Books</span>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <th>#Loan id</th>
                    <th>Book Name</th>
                    <th>Borrower's Name</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                    <th>Actions</th>
                    </thead>

                    <?php foreach ($loans as $loan){ ?>
                        <?php $book = Book::find_by_id($loan->isbn); ?>
                        <?php $user = User::find_by_id($loan->user_id); ?>
                        <?php
                            $issue_date = date("jS M, Y", strtotime($loan->issue_date));
                            $return_date = date("jS M, Y", strtotime($loan->return_date));
                        ?>

                        <tr <?php if($loan->is_expired()){echo "class=\"table-danger\"";} ?>>
                            <td><?php echo $loan->id ?></td>
                            <td><?php echo $book->name ?></td>
                            <td><?php echo $user->full_name(); ?></td>
                            <td><?php echo $issue_date ?></td>
                            <td><?php echo $return_date ?></td>
                            <td>

                                <a class="btn btn-success btn-sm" href="#">Mark as Returned</a>
                            </td>
                        </tr>

                    <?php } ?>


                </table>
            </div>
        </div>

    </div>


<?php require_once(SHARED_PATH . "/public_footer.php");?>