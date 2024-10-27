<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Preference Chatbox</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .chatbox {
            width: 600px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .chatbox-header {
            background-color: #6200ea;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .chatbox-content {
            padding: 10px;
            height: 400px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        .chatbox-input {
            display: flex;
            border-top: 1px solid #ddd;
        }
        .chatbox-input input {
            flex: 1;
            padding: 10px;
            border: none;
            outline: none;
        }
        .chatbox-input button {
            padding: 10px;
            background-color: #6200ea;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .message {
            margin: 5px 0;
            padding: 10px;
            border-radius: 4px;
        }
        .bot-message {
            background-color: #f1f1f1;
            align-self: flex-start;
        }
        .user-message {
            background-color: #6200ea;
            color: #fff;
            align-self: flex-end;
        }
    </style>
</head>
<body>
    <div class="chatbox">
        <div class="chatbox-header">
            <h3>Fashion Advisor</h3>
        </div>
        <div class="chatbox-content" id="chatbox-content">
            <div class="message bot-message">Hi! I am your fashion advisor. How can I help you today?</div>
        </div>
        <div class="chatbox-input">
            <input type="text" id="user-input" placeholder="Type your question here...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>
    <script>
        function sendMessage() {
            const userInput = document.getElementById("user-input");
            const message = userInput.value.trim();
            if (message !== "") {
                displayMessage(message, "user-message");
                userInput.value = "";
                getResponse(message);
            }
        }

        function displayMessage(message, className) {
            const chatboxContent = document.getElementById("chatbox-content");
            const messageElement = document.createElement("div");
            messageElement.className = `message ${className}`;
            messageElement.textContent = message;
            chatboxContent.appendChild(messageElement);
            chatboxContent.scrollTop = chatboxContent.scrollHeight;
        }

        function getResponse(message) {
            let response = "";

            if (message.includes("color suits my skin color")) {
                response = "Please specify your skin tone (fair, medium, dark).";
            } else if (message.includes("fair")) {
                response = "For fair skin, try wearing pastel shades, bright colors like ruby red, and jewel tones.";
            } else if (message.includes("medium")) {
                response = "For medium skin, earthy tones, rich shades like ruby, deep blues, and greens work well.";
            } else if (message.includes("dark")) {
                response = "For dark skin, vibrant colors like cobalt blue, royal purple, and bright pink are great.";
            } else if (message.includes("tall")) {
                response = "For tall girls, try wearing maxi dresses, high-waisted pants, and long jackets.";
            } else if (message.includes("short")) {
                response = "For short girls, wear high-waisted skirts, vertical stripes, and avoid overly long clothes.";
            } else if (message.includes("fat")) {
                response = "For plus-size girls, wear well-fitted clothes, A-line dresses, and dark colors for a slimming effect.";
            } else if (message.includes("slim")) {
                response = "For slim girls, try wearing layered clothing, ruffled tops, and bold patterns to add volume.";
            } else if (message.includes("tips to look simple")) {
                response = "To look simple, wear solid colors, avoid heavy prints, and go for minimal accessories.";
            } else if (message.includes("tips to look unique")) {
                response = "To look unique, mix and match patterns, incorporate vintage pieces, and accessorize creatively.";
                        } else {
                response = "I'm sorry, I didn't understand that. Can you please rephrase?";
            }

            displayMessage(response, "bot-message");
        }
    </script>
</body>
</html>
