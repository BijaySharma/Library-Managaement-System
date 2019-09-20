<?php require_once("../../../private/initialize.php") ?>
<?php
if(!isset($_GET['id'])){
    redirect_to(url_for("/admin/books/all_books.php"));
}
$id=$_GET['id'];
$book = Book::find_by_id($id);
if($book == false){
    redirect_to(url_for("/admin/books/all_books.php"));
}


$categories = Category::find_all();
$authors = Author::find_all();

if(is_post_request()){
    $args = $_POST['book'];

    $book->isbn_check =false;
    $book->merge_attributes($args);
    $result = $book->save();

    if($result == true){
        $_SESSION['message'] = "Book details has been updated successfully.";
        redirect_to("/admin/books/all_books.php");
    }else{
        //display errors
    }

}else{
    // Display the form
}



?>
<?php require_once(SHARED_PATH . "/admin_header.php");?>

    <div class="container mb-4">
        <h1 class="display-3 mb-4 text-center text-primary">Edit Book</h1>

        <div class="card" style="margin: 0 auto; max-width: 600px">
            <div class="card-header">
                Update Book Details
            </div>
            <div class="card-body">
                <?php echo display_errors($book->errors); ?>

                <form method="post" action="edit_book.php?id=<?php echo $book->id; ?>">

                    <div class="form-group">
                        <label class="form-label" for="isbn">ISBN</label>
                        <input type="text" class="form-control" value="<?php echo $book->id ?>" class="form-control" disabled>
                        <small>Book's ISBN cannot be changed</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="name">Book Name</label>
                        <input type="text" name="book[name]" class="form-control" value="<?php echo $book->name ?? '' ?>" placeholder="Book Name">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="author_id">Author</label>
                        <select name="book[author_id]" class="form-control">
                            <?php foreach($authors as $author){ ?>

                                <option value="<?php echo $author->id; ?>" <?php if($author->id == $book->author_id){echo "Selected";} ?>>
                                    <?php echo $author->name;?>
                                </option>

                            <?php } ?>
                        </select>
                        <small class="form-text text-muted">Author not listed? <a href="add_author.php">Add a new author</a></small>
                    </div>

                    <div class="form-group">
                        <select name="book[category_id]" class="form-control">
                            <?php foreach($categories as $category){ ?>

                                <option value="<?php echo $category->id; ?>" <?php if($category->id == $book->category_id){echo "Selected";} ?>>
                                    <?php echo $category->name;?>
                                </option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="price">Price</label>
                        <input type="number" name="book[price]" value="<?php echo $book->price ?? '' ?>" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="copies">Copies</label>
                        <input type="number" name="book[copies]" value="<?php echo $book->copies ?? '' ?>" class="form-control" >
                    </div>


                    <div class="form-group text-center">
                        <input type="submit" value="Update" class="btn btn-primary" name="submit">
                    </div>
                </form>
            </div>
        </div>

    </div>


<?php require_once(SHARED_PATH . "/public_footer.php");?>