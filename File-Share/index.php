<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Share | Modern Uploader</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #333;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
            width: 90%;
            max-width: 700px;
            overflow: hidden;
        }
        
        header {
            background: linear-gradient(90deg, #4b6cb7 0%, #182848 100%);
            color: white;
            padding: 25px;
            text-align: center;
            position: relative;
        }
        
        header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #00c9ff 0%, #92fe9d 100%);
        }
        
        h1 {
            font-size: 32px;
            margin-bottom: 5px;
            font-weight: 700;
        }
        
        .content {
            padding: 30px;
        }
        
        .upload-section {
            margin-bottom: 40px;
        }
        
        .upload-form {
            border: 2px dashed #a1c4fd;
            border-radius: 12px;
            padding: 30px;
            transition: all 0.3s ease;
            background: #f8faff;
            text-align: center;
        }
        
        .upload-form:hover {
            background-color: #f0f5ff;
            border-color: #7b9ee6;
        }
        
        .upload-form h2 {
            color: #4b6cb7;
            margin-bottom: 20px;
            font-size: 22px;
        }
        
        /* Custom file input styling */
        .file-input-container {
            position: relative;
            margin: 25px 0;
        }
        
        .uploa {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            z-index: 10;
        }
        
        .file-input-design {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 30px;
            border: 2px dashed #4b6cb7;
            border-radius: 10px;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .file-input-design:hover {
            background-color: #e9ecef;
            border-color: #2575fc;
        }
        
        .file-icon {
            font-size: 50px;
            color: #4b6cb7;
            margin-bottom: 15px;
        }
        
        .file-text {
            text-align: center;
        }
        
        .file-text h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: #2c3e50;
        }
        
        .file-text p {
            font-size: 14px;
            color: #6c757d;
        }
        
        .file-name {
            margin-top: 15px;
            font-size: 14px;
            color: #4b6cb7;
            font-weight: 500;
            display: none;
        }
        
        .upload-btn {
            background: linear-gradient(90deg, #4b6cb7 0%, #182848 100%);
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .upload-btn i {
            margin-right: 8px;
        }
        
        .upload-btn:hover {
            background: linear-gradient(90deg, #182848 0%, #4b6cb7 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        
        .upload-btn:active {
            transform: translateY(0);
        }
        
        .message {
            padding: 15px;
            margin: 20px 0;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            display: none;
        }
        
        .error {
            background-color: #ffebee;
            color: #d32f2f;
            border: 1px solid #f5c6cb;
        }
        
        .success {
            background-color: #e8f5e9;
            color: #388e3c;
            border: 1px solid #c3e6cb;
        }
        
        .no-files {
            text-align: center;
            padding: 30px;
            color: #6c757d;
            font-style: italic;
        }
        
        @media (max-width: 600px) {
            .container {
                width: 95%;
            }
            
            .content {
                padding: 20px;
            }
            
            .upload-form {
                padding: 20px;
            }
            
            .file-input-design {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>File Share</h1>
            <p>Simple and secure file sharing</p>
        </header>
        
        <div class="content">
            <div class="upload-section">
                <form class="upload-form" method="POST" enctype="multipart/form-data" action="upload.php">
                    <h2>Upload a File</h2>
                    
                    <div class="file-input-container">
                        <input class="uploa" type="file" name="file" required id="fileInput">
                        <div class="file-input-design">
                            <div class="file-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="file-text">
                                <h3>Drag & Drop or Click to Upload</h3>
                                <p>Max file size: 50MB</p>
                            </div>
                            <div class="file-name" id="fileName">No file selected</div>
                        </div>
                    </div>
                    
                    <button type="submit" name="upload" class="upload-btn">
                        <i class="fas fa-upload"></i> Upload File
                    </button>
                </form>
                
                <!-- Messages -->
                <div class="message error" id="errorMessage">
                    Error: There was a problem uploading your file.
                </div>
                
                <div class="message success" id="successMessage">
                    File uploaded successfully!
                </div>
            </div>
<?php

$files = scandir("uploads");
for ($a = 2; $a < count($files); $a++) {
?>
<p class="final">
<a download="<?php echo $files[$a] ?>" href="uploads/<?php echo $files[$a] ?>"><?php echo $files[$a] ?></a>
</p>
<?php
}
?>

    <script>
        // Simple JavaScript to show messages based on URL parameters
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            
            if (urlParams.has('error')) {
                const errorMessage = document.getElementById('errorMessage');
                errorMessage.textContent = 'Error: ' + urlParams.get('error');
                errorMessage.style.display = 'block';
            }
            
            if (urlParams.has('success')) {
                const successMessage = document.getElementById('successMessage');
                successMessage.textContent = urlParams.get('success');
                successMessage.style.display = 'block';
            }
            
            // File input handling
            const fileInput = document.getElementById('fileInput');
            const fileName = document.getElementById('fileName');
            
            fileInput.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    fileName.textContent = this.files[0].name;
                    fileName.style.display = 'block';
                } else {
                    fileName.style.display = 'none';
                }
            });
            
            // Drag and drop functionality
            const fileInputDesign = document.querySelector('.file-input-design');
            
            fileInputDesign.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.style.background = '#e3eaf9';
                this.style.borderColor = '#2575fc';
            });
            
            fileInputDesign.addEventListener('dragleave', function() {
                this.style.background = '#f8f9fa';
                this.style.borderColor = '#4b6cb7';
            });
            
            fileInputDesign.addEventListener('drop', function(e) {
                e.preventDefault();
                this.style.background = '#f8f9fa';
                this.style.borderColor = '#4b6cb7';
                
                if (e.dataTransfer.files && e.dataTransfer.files.length > 0) {
                    fileInput.files = e.dataTransfer.files;
                    
                    fileName.textContent = e.dataTransfer.files[0].name;
                    fileName.style.display = 'block';
                }
            });
        });
    </script>
</body>
</html>
