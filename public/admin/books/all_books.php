<?php require_once("../../../private/initialize.php"); ?>

<?php $books = Book::find_all(); ?>

<?php require_once(SHARED_PATH . "/admin_header.php");?>

    <style>
        .card{
            margin: 1em 0;
        }
    </style>
    <div class="container">
        <h1 class="display-3 text-primary text-center mb-4">
            Books
        </h1>

        <?php echo display_session_message(); ?>
        <a href="add_book.php" class="btn btn-primary ml-2">Add a new Book</a>



        <div class="card">
            <div class="card-header" style="background: #fffee6;">
                <span class="h4">List of Books</span>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <th>#ISBN</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Copies</th>
                    <th>Price</th>
                    <th>Issued</th>
                    <th>Available</th>
                    <th>Actions</th>
                    </thead>

                    <?php foreach ($books as $book){ ?>
                        <?php $author = Author::find_by_id($book->author_id); ?>
                        <?php $category = Category::find_by_id($book->category_id); ?>
                        <tr>
                            <td><?php echo $book->id ?></td>
                            <td><?php echo $book->name ?></td>
                            <td><?php echo $author->name ?></td>
                            <td><?php echo $category->name ?></td>
                            <td><?php echo $book->copies ?></td>
                            <td><?php echo $book->price ?></td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="edit_book.php?id=<?php echo $book->id; ?>">Edit</a>
                                <a class="btn btn-danger btn-sm disabled" href="#">Delete</a>
                            </td>
                        </tr>

                    <?php } ?>


                </table>
            </div>
        </div>

    </div>


<?php require_once(SHARED_PATH . "/public_footer.php");?>