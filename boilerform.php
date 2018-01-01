<?php
$show_form = true;

if ($_POST){
    // they have submitted the form
    if (($_POST['email']) AND ($_POST['name'])){
        // they've filled in all fields
        $show_form = false;
        echo 'Well done!';
    }else{
        echo 'Please fill in all fields';
    }
}


if ($show_form){ ?>
    <form action="boilerform.php" method="post">
        Name: <input type="text" name="name" /><br>
        Email: <input type="text" name="email" /><br>
        <input type="submit" value="Send" />
    </form>
<?php } ?>


