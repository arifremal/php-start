<?php
$uploadsDir="uploads/";
$contactFile="contact.json";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
    $email=filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
    $phone=filter_input(INPUT_POST,"phone",FILTER_SANITIZE_NUMBER_INT);
    if($name && $email && $phone && isset($_FILES['image'])){
        if(!is_dir($uploadsDir)){
            mkdir($uploadsDir);
        }
        $imageName=time()."_".basename($_FILES["image"]["name"]);
        $imagePath = $uploadsDir.$imageName;

        if(move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)){
            $contact= file_exists($contactFile) ? json_decode(file_get_contents($contactFile)) :[];
            $contact[""]=[
                'id'=>rand(1000000,20000),
                'name'=>$name,
                'email'=>$email,
                'phone'=>$phone,
                'image'=>$imagePath
            ];
file_put_contents($contactFile,json_encode($contact,JSON_PRETTY_PRINT));

        echo"contact added: $name($email,$phone)";

    }
    
 else{
    echo "invalid";
}
}}
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