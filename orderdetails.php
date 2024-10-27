<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        main {
            flex-grow: 1;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .order-progress {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 600px;
            margin-top: 2rem;
            position: relative;
        }

        .step {
            text-align: center;
            flex: 1;
            position: relative;
        }

        .circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ccc;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            position: relative;
            z-index: 1;
        }

        .label {
            margin-top: 0.5rem;
            font-size: 0.9rem;
        }

        .step.completed .circle {
            background-color: #4CAF50;
        }

        .step::before {
            content: '';
            position: absolute;
            top: 50%;
            left: -50%;
            width: 100%;
            height: 4px;
            background-color: #ccc;
            z-index: 0;
            transform: translateY(-50%);
        }

        .step:first-child::before {
            display: none;
        }

        .step.completed::before {
            background-color: #4CAF50;
            animation: fillLine 1s forwards;
        }

        @keyframes fillLine {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }

        .chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            font-size: 1rem;
        }

        .chat-button:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Order Details</h1>
        </header>
        <main>
            <div class="order-progress">
                <div class="step completed">
                    <div class="circle">1</div>
                    <div class="label">Order Placed</div>
                </div>
                <div class="step completed">
                    <div class="circle">2</div>
                    <div class="label">Order Confirmed</div>
                </div>
                <div class="step">
                    <div class="circle">3</div>
                    <div class="label">Shipped</div>
                </div>																														
                <div class="step">
                    <div class="circle">4</div>
                    <div class="label">Out for Delivery</div>
                </div>
                <div class="step">
                    <div class="circle">5</div>
                    <div class="label">Delivered</div>
                </div>
            </div>
        </main>
    </div>
    <button class="chat-button">Chat with Us</button>
</body>
</html>
