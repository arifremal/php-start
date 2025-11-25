<?php
var_dump($_FILES);
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
    $email=filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
    $phone=filter_input(INPUT_POST,"phone",FILTER_SANITIZE_NUMBER_INT);
    if($name && $email && $phone){
        echo"contact added: $name($email,$phone)";
} else{
    echo "invalid";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for=" ">Name:</label>
        <input type="text" name="name" required>
        <label for=" ">Email:</label>
        <input type="email" name="email" required>
        <label for=" ">Phone:</label>
        <input type="text" name="phone" >
        <label for=" ">Image:</label>
        <input type="file" name="image" >
        <button type="submit">Add contact</button>
    </form>
</body>
</html>