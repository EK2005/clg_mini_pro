<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recycle Dresses for Discounts and Credits</title>
<style>
    /* Global styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 20px;
    }
    .container {
        max-width: 800px;
        margin: auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }
    p {
        line-height: 1.6;
    }
    .dresses {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        grid-gap: 20px;
    }
    .dress {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .dress h3 {
        margin-top: 0;
        font-size: 18px;
        margin-bottom: 10px;
    }
    .dress p {
        margin-bottom: 10px;
    }
    .recycling-info {
        margin-top: 30px;
        padding: 15px;
        background-color: #e0f7fa;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .recycling-info h2 {
        margin-top: 0;
        font-size: 20px;
        margin-bottom: 15px;
    }
    .recycling-info ul {
        margin-bottom: 10px;
    }
    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #333;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
        transition: background-color 0.3s;
    }
    .button:hover {
        background-color: #555;
    }
    .upload-form {
        display: none;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Recycle Dresses for Discounts and Credits</h1>

        <div class="dresses">
            <div class="dress">
                <h3>Dress 3</h3>
                <p>Description of dress 3. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p><strong>Material:</strong> Polyester</p>
                <p><strong>Recyclable:</strong> Yes</p>
                               <a href="#" class="button" onclick="showUploadForm(this)">Recycle Now</a>
                <form class="upload-form" enctype="multipart/form-data" onsubmit="handleSubmit(event)">
                    <input type="file" name="dressImage" accept="image/*" required>
                    <button type="submit">Upload</button>
                </form>
            </div>
            <!-- Add more dress items similarly -->
        </div>

        <div class="recycling-info">
            <h2>Recycling Information</h2>
            <p>Here are some tips for recycling dresses:</p>
            <ul>
                <li>Check local recycling guidelines for accepted materials.</li>
                <li>Donate gently-used dresses to local charities or thrift stores.</li>
                <li>Reuse dresses for craft projects or repurpose fabric.</li>
                <li>Consider eco-friendly dry cleaning options.</li>
            </ul>
            <p>Contact your local recycling center for more information on how to recycle responsibly.</p>
        </div>
    </div>

    <script>
        function showUploadForm(button) {
            const dressContainer = button.closest('.dress');
            const uploadForm = dressContainer.querySelector('.upload-form');
            uploadForm.style.display = 'block';
            button.style.display = 'none'; // Hide "Recycle Now" button after showing form
        }

        function handleSubmit(event) {
            event.preventDefault();
            alert("Your product is sent.If it is selected then it will be collected from your address in a few days.");
            // Additional logic for handling form submission (e.g., send data to server)
        }
    </script>
</body>
</html>