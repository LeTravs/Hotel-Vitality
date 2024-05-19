@extends('layout')

@section('content')
    <style>
        #content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center; 
            background-image: url('https://i.pinimg.com/736x/9e/ed/2d/9eed2d1815cfd2343c8397d9303d93c7.jpg');
            background-size: cover;
            background-position: center;
        }
        .container {
            background-color: #dbe5e9;
            padding: 30px;
            max-width: 700px;
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form, .info {
            width: 45%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #f8ebeb;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form {
            margin-right: 5%;
            margin-left: 5%;
            text-align: center;
        }

        .form button {
            margin: 15px auto;
            display: block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form button:hover {
            background-color: #0056b3;
        }

        .info {
            background: linear-gradient(145deg, #dbe9f6, #b7d7ef);
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        img#qrcode {
            width: 100px;
            height: 100px;
            border-radius: 5px;
        }

        .qr-code-box {
            width: 150px; 
            height: 150px; 
            margin: 20px auto; 
            border: 2px solid #0a0b0c; 
            border-radius: 10px; 
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header#header {
            font-size: 24px;
            font-weight: bold;
        }


        input[type="number"],
        input[type="text"],
        input[type="email"], 
        input[type="password"] {
            width: 100%; 
            padding: 5px; 
            margin-bottom: 15px; 
            box-sizing: border-box; 
        }

        .title {
            font-size: 15px; 
            font-weight: bold;
            color: #333; 
            margin-bottom: 20px; 
        }
        .hotel-code {
            font-size: 14px; 
            font-weight: bold;
            color: #0d0f11; 
            margin-top: 1px; 
        }
    </style>
    <div class="container">
        <div class="form">
            <div>
                <label for="room_number">Room Number:</label>
                <input type="number" id="room_number" min="1" max="50" class="common-input">
            </div>
            <div>
                <label for="name">Guest Name:</label>
                <input type="text" id="name" class="common-input">
            </div>
            <div>
                <label for="password">Password:</label> 
                <input type="password" id="password" class="common-input"> 
            </div>
            <div>
                <button type="button" onclick="generateQR()">Save</button>
            </div>
        </div>
        <div class="info">
            <img src="Logo.png" alt="Logo" width="50" height="50"> 
            <br>
            <div class="title">BE OUR GUEST ENJOY THE WIFI</div>
            <div class="qr-code-box">
                <img id="qrcode" src="https://static.vecteezy.com/system/resources/previews/019/786/999/original/qr-code-scanning-icon-in-smartphone-on-transparent-background-free-png.png" alt="qrcode" >
            </div>
            <header id="header"></header>
            <p id="passwordText"></p> 
            <h1 class="hotel-code">PLEASE SCAN QR CODE TO CONNECT</h1>
        </div>
    </div>
    <script>
        function generateQR() {
            var serialNumber = document.getElementById('room_number').value;
            var name = document.getElementById('name').value;
            var password = document.getElementById('password').value; 
    
            // Check if all fields are filled
            if (serialNumber === "" || name === "" || password === "") {
                alert("Please fill in all fields before saving.");
                return;
            }
    
            var qrCodeText = "Room Number: " + serialNumber + "\nName: " + name + "\nPassword: " + password; 
    
            var qrCodeImage = document.getElementById('qrcode');
            qrCodeImage.src = 'https://api.qrserver.com/v1/create-qr-code/?data=' + encodeURIComponent(qrCodeText);
    
            var header = document.getElementById('header');
            header.textContent = name;
    
            var passwordText = document.getElementById('passwordText'); 
            passwordText.textContent = "Password: " + password; 
            
            // Clear form fields
            document.getElementById('room_number').value = "";
            document.getElementById('name').value = "";
            document.getElementById('password').value = "";
        }
    </script>
    
@endsection
