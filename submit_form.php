<?php
include 'db_config.php'; // Ensure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $secondName = mysqli_real_escape_string($conn, $_POST['secondName']);
    $familyName = mysqli_real_escape_string($conn, $_POST['familyName']);
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    
    // Email validation for Gmail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/^[^\s@]+@gmail\.com$/', $email)) {
        die("Invalid email format; must be a Gmail address. \nتنسيق البريد الإلكتروني غير صالح؛ يجب أن يكون عنوان جيميل.");
    }

    if (!preg_match('/^(?:\+967)?(?:7[0-9]{8})$/', $phoneNumber)) {
        die("Invalid phone number format; must be a valid Yemen phone number. Format: +967 7XX XXX XXX or 07XX XXX XXX <br>تنسيق رقم الهاتف غير صالح؛ يجب أن يكون رقم هاتف يمني صالح. الصيغة: +967 7XX XXX XXX <br>أو 07XX XXX XXX.");
    }
    
   
    $target_dir = "uploads/"; // Ensure this directory exists and is writable
    $target_file = $target_dir . basename($_FILES["documentPhoto"]["name"]);
    $uploadOk = 1;
    // You can add file validation checks here (file size, format, etc.)

    if (move_uploaded_file($_FILES["documentPhoto"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename($_FILES["documentPhoto"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        // Prepare SQL with the new column
        $sql = "INSERT INTO user_details (firstName, secondName, familyName, email, phoneNumber, documentPhoto)
                VALUES (?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssss', $firstName, $secondName, $familyName, $email, $phoneNumber, $target_file);

        if (mysqli_stmt_execute($stmt)) {
            header('Location: thankyou.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>