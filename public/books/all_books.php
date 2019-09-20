<?php
$books = Book::find_all();
?>


        <?php
            foreach ($books as $book){ ?>

                    <div class="card mb-1">
                        <div class="card-body">
                            <a href="view_book.php?id=<?php echo $book->id; ?>"><strong><?php echo $book->name; ?></strong></a><br>
                            <Span><b>Authors:</b><?php echo $book->authors; ?></Span><br>
                            <Span><b>Publisher:</b><?php echo $book->publisher; ?></Span><br>
                            <Span><b>ISBN:</b><?php echo $book->id; ?></Span><br>
                        </div>
                    </div>
            <?php } ?>

