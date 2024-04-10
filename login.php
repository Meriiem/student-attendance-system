<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance System | Login </title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/loader.css">
</head>

<body>
    <!-- <div class="header">
        <h1>Welcome to the Student Attendance System</h1>
        <p>Please log in to continue</p>
    </div> -->

    <div class="loginform">
        <div class="inputgroup topmarginlarge">
            <input type="text" id="txtUsername" required>
            <label for="txtUsername" id="lblUsername">USER NAME</label>
        </div>

        <div class="inputgroup topmarginlarge">
            <input type="password" id="txtPassword" required>
            <label for="txtPassword" id="lblPassword">PASSWORD</label>
        </div>

        <div class="divcallforaction topmarginlarge">
            <button class="btnlogin inactivecolor" id="btnLogin">LOGIN</button>
        </div>

        <div class="diverror topmarginlarge" id="diverror">
            <label class="errormessage" id="errormessage">ERROR GOES HERE</label>
        </div>


    </div>

    <div class="lockscreen" id="lockscreen">
        <div class="spinner" id="spinner"></div>
        <label class="lblwait topmargin" id="lblwait">PLEASE WAIT</label>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/login.js"></script>
</body>

</html>