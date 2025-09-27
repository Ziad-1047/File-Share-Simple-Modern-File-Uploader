<?php
// upload.php with error handling
if (isset($_FILES["file"])) {
    $file = $_FILES["file"];
    
    // Check for errors
    if ($file["error"] !== UPLOAD_ERR_OK) {
        header("Location: index.php?error=File upload failed with error code " . $file["error"]);
        exit;
    }
    
    // Check if uploads directory exists and is writable
    if (!is_dir("uploads") || !is_writable("uploads")) {
        header("Location: index.php?error=Upload directory doesn't exist or isn't writable");
        exit;
    }
    
    // Sanitize file name
    $filename = basename($file["name"]);
    
    // Try to move the uploaded file
    if (move_uploaded_file($file["tmp_name"], "uploads/" . $filename)) {
        header("Location: index.php?success=File uploaded successfully");
    } else {
        header("Location: index.php?error=Failed to move uploaded file");
    }
} else {
    header("Location: index.php?error=No file was uploaded");
}
exit;
?>
