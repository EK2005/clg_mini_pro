<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Support Chat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            
            margin: 0;
            padding: 20px;
'          background-image:url('images/banner_1.webp');
        }
        .chat-container {
            max-width: 600px;
            margin: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }
        .chat-header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .chat-messages {
            padding: 10px;
            overflow-y: scroll;
            max-height: 400px;
        }
        .message {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 5px 10px;
            margin-bottom: 10px;
            clear: both;
        }
        .message.user-message {
            float: right;
            background-color: #4CAF50;
            color: white;
        }
        .message.support-message {
            float: left;
            background-color: #2196F3;
            color: white;
        }
        .message p {
            margin: 5px 0;
        }
        .chat-input {
            padding: 10px;
            background-color: #fff;
            border-top: 1px solid #ccc;
        }
        .chat-input input[type=text] {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            outline: none;
            font-size: 14px;
        }
        .chat-input button {
            width: 28%;
            padding: 10px;
            margin-left: 2%;
            border: none;
            background-color: #333;
            color: white;
            cursor: pointer;
            border-radius: 3px;
            outline: none;
            font-size: 14px;
        }
        .options {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
        }
        .option {
            margin-right: 10px;
            margin-bottom: 10px;
            background-color: #ccc;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
        }
        .option:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <h2>Customer Support Chat</h2>
        </div>
        <div class="chat-messages" id="chat-messages">
            <div class="message support-message">
                <p>Welcome to Dreamworld Textiles customer support. How can we assist you today?</p>
            </div>
        </div>
        <div class="chat-input">
            <input type="text" id="user-input" placeholder="Type your message..."><br><br>
            <button onclick="sendMessage()">Send</button>
        </div>
        <div class="options">
            <div class="option" onclick="selectOption('Order tracking')">Order tracking</div>
            <div class="option" onclick="selectOption('Product details')">Product details</div>
            <div class="option" onclick="selectOption('Shipping information')">Shipping information</div>
            <div class="option" onclick="selectOption('Returns and exchanges')">Returns and exchanges</div>
            <div class="option" onclick="selectOption('Promotions and discounts')">Promotions and discounts</div>
        </div>
    </div>

    <script>
        function sendMessage() {
            var userMessage = document.getElementById("user-input").value;
            if (userMessage.trim() === "") {
                return;
            }
            var chatMessages = document.getElementById("chat-messages");
            var newMessage = document.createElement("div");
            newMessage.className = "message user-message";
            newMessage.innerHTML = "<p>" + userMessage + "</p>";
            chatMessages.appendChild(newMessage);
            document.getElementById("user-input").value = "";
            chatMessages.scrollTop = chatMessages.scrollHeight;
            // Simulate a response after a short delay (in a real application, this would be fetched from a server)
            setTimeout(function() {
                var supportMessage = document.createElement("div");
                supportMessage.className = "message support-message";
                supportMessage.innerHTML = "<p>Thank you for your message. Our team will get back to you shortly.</p>";
                chatMessages.appendChild(supportMessage);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 1000);
        }

        function selectOption(option) {
            var chatMessages = document.getElementById("chat-messages");
            var newMessage = document.createElement("div");
            newMessage.className = "message user-message";
            newMessage.innerHTML = "<p>" + option + "</p>";
            chatMessages.appendChild(newMessage);
            chatMessages.scrollTop = chatMessages.scrollHeight;
            // Simulate a response after a short delay (in a real application, this would be fetched from a server)
            setTimeout(function() {
                var supportMessage = document.createElement("div");
                supportMessage.className = "message support-message";
                supportMessage.innerHTML = "<p>Thank you for your query about '" + option + "'. How can we assist you further?</p>";
                chatMessages.appendChild(supportMessage);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 1000);
        }
    </script>
</body>
</html>