<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            background-image:url(pic.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .rf{
            width: 450px;
            height: 400px;
            border: 10px inset;
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform:translate(-50%,-50%);
            border-radius: 10px;
            background-color:rgba(103, 160, 203, 0.463);

        }
        h1{
            margin-bottom: 30px;
            color:black;
            font-weight:bold;
        }
        #name,#email,#password{
            width: 280px;
            height: 30px;
           
        }
        .btn{
            width: 80px;
            height: 40px;
            margin-left: 30px;
            margin-top: 15px;
            background-image: linear-gradient(120deg,rgb(61, 61, 238),white,rgb(44, 209, 138));
            border-radius: 30px;
            border: 5px inset white;
            cursor: pointer;

        }
        label{
            color: black;
        }
    </style>
</head>
<body>
    <div class="rf">
        <h1>User SignUp/SignIn</h1>
            <form action="" method="post">
                <label for="name">Name</label><br>
                <input type="text" name="name" id="name"><br><br>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email"><br><br>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password"><br><br>
                <input type="submit" class="btn" value="Sign_Up" name="signup" id="signup">
                <input type="submit" class="btn" value="Sign_In" name="signin" id="signin">
            </form>
    </div>
    <?php
    if(isset($_POST['signup']))
    {   // to get value from inputboxes and store in different variables as soon as signup button click
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        //connect with mysql server and its database
        $mycon=mysqli_connect('localhost','root',"",'webp');
        //write a query to insert record in the users table but currently just store the query in q variable
        $q="insert into users values ('$name','$email','$password')";
        //execute the query written above to finally insert the record in the table 'users'
        $res=mysqli_query($mycon,$q);
        echo $res."SignUP Completed!";


    }
    if(isset($_POST['signin']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
    //connection with mysql server and the database
        $mycon=mysqli_connect("localhost","root","","webp");
        $q="select * from users where email='$email' and password='$password'";
        $rec=mysqli_query($mycon,$q);
        //mysqli_fetch_assoc()
        if(mysqli_num_rows($rec)>0)
        {
            echo "Login!";
        }
        else{
            echo "Login Failed because invalid email or password!";
        }
    }
    ?>

</body>
</html>