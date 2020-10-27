
<?php
    
    if(isset($_FILES['image']))
    {
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileTemp = $_FILES['image']['tmp_name'];
        $result = move_uploaded_file ($fileTemp, 'uploads/'.$fileName);
        if($result)
        {
            echo 'OK';
        }
        else
        {
            echo 'Fail';
        }
    }
?>
