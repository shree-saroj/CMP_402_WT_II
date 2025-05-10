<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 20px;
        }
        .container {
            background: #fff;
            padding: 20px 30px;
            max-width: 500px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            margin-top: 20px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .inline-group {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }
        .astrik {
            color: red;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 2px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Registration Form</h2>
    <p>Use tab keys to move from one input field to the next.</p>
    <form action="validation.php" method="post">
        <label for="userid">User Id: <span class="astrik">*</span></label>
        <input type="text" id="userid" name="userid">
        <label for="password">Password: <span class="astrik">*</span></label>
        <input type="password" id="password" name="password">
        <label for="firstname">First Name: <span class="astrik">*</span></label>
        <input type="text" id="firstname" name="firstname">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
        <label for="country">Country: <span class="astrik">*</span></label>
        <select id="country" name="country">
            <option value="Nepal">Nepal</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
        </select>
        <label for="zipcode">ZIP Code: <span class="astrik">*</span></label>
        <input type="text" id="zipcode" name="zipcode">
        <label for="email">Email: <span class="astrik">*</span></label>
        <input type="text" id="email" name="email">
        <label>Sex: <span class="astrik">*</span></label>
        <div class="inline-group">
            <input type="radio" id="male" name="sex" value="male" checked>
            <label for="male">Male</label>
            <input type="radio" id="female" name="sex" value="female">
            <label for="female">Female</label>
        </div>
        <label>Language: <span class="astrik">*</span></label>
        <div class="inline-group">
            <input type="checkbox" id="english" name="language[]" value="English" checked>
            <label for="english">English</label>
            <input type="checkbox" id="nonenglish" name="language[]" value="Non English">
            <label for="nonenglish">Non English</label>
        </div>
        <label for="about">About:</label>
        <textarea id="about" name="about" rows="4" placeholder="Tell us something about yourself..."></textarea>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

</body>
</html>
