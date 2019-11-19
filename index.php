<?php

require "include/db.php";
require "include/head.php";
require "include/function.php";

$data = $_POST;

// add todo to database
if(isset($data['new_todo'])){
    addTodo($data['todo']);
}

// delete todo from database

if(isset($_POST['delete_todo'])){
    $id = $_POST['todo_id'];
    deleteTodo($id);    
}

date_default_timezone_set('Asia/Baku');

?>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="mt-5 text-center">Todo List</h1>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <form action="?page=new_todo" method="post">
                    <div class="input-group">
                        <input type="text" name="todo" class="form-control">
                        <button name="new_todo" class="btn btn-primary ml-1" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>

        <div class=" row mt-3">
                <div class="col-md-6 offset-md-3">

                    <div class="card card-body bg-light">
                        <h3 class="text-center"><?=date("d-m-Y")?></h3>
                        // get todo_name from database
                        <?php foreach (getTodo() as $todo) { ?>
                        <div
                            class="d-flex flex-row justify-content-between align-items-center pl-2 pr-2 pt-2 pb-2 mt-3 bg-dark text-light">

                            </span><span><?=$todo["todo_name"]?></span>

                            <div>
                                <form action='?page=delete_todo' method='post'>
                                    <input type='hidden' name='todo_id' value='<?=$todo['id']?>'>
                                    <input class="btn btn-success" type='submit' name='delete_todo' value='Done'>
                                </form>

                            </div>

                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>

        </div>
        <!-- Bootstrap scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>

</html>
