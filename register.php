<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">

<style>
body{
    margin: 0;
    padding: 0;
    font-family: 'rubik';
    background-color: #B1B1B1;
}

#navbar{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    background: #252424;
    align-items: center;
    height: 150px;
    color: #B1B1B1;
}

#navbutton{
    text-decoration: none;
    padding: 6px;
    background: #B1B1B1;
    border-radius: 5px;
    color: black;
    margin: 0 5px;
}

#navbutton:hover{
    background-color: white;
}

#form{
    margin: 0 auto;
    margin-top: 50px;
    width: 30%;
    display: flex;
    flex-direction: column;
    background-color: white;
    border-radius: 10px;
    outline: solid 4px black;
}

#names{
    display: flex;
    flex-direction: row;
}

#firstname{
    display: flex;
    flex-direction: column;
    margin: 10px;
    width: 100%;
}

#lastname{
    display: flex;
    flex-direction: column;
    margin: 10px;
    width: 100%;
}

#field{
    display: flex;
    flex-direction: column;
    margin: 10px;
    width: 100%;
}

label{
    text-wrap:nowrap;
}

input{
    height: 40px;
    font-size: 18px;
    padding-left: 10px;
    border-radius: 4px;
    width: 100%;
}

em{
    color: red;
}

#notnames{
    margin: 0 10px 10px;
}

#formHeader{
    padding-top: 10px;
    text-align: center;
    height: 100px;
    background: #252424;
    color: white;
    font-size: 30px;
}


#dob h1{
    font-size: 15px;
    padding-left: 10px;
    margin-bottom: 0px;
}

#dob2{
    display: flex;
    flex-direction: row;
    width: 100%;
}

#dob-month{
    font-size: 18px;
    height: 40px;
    width: 100%;
    margin:0px 5px 5px 0px;
}

#submit{
    padding: 50px 50px 5px 50px;
}

#month{
    height: 40px;
    font-size: 16px;
    padding-left: 10px;
    border-radius: 4px;
    width: 50%;
}

#dayYear{
    display: flex;
    flex-direction: column;
    margin-right: 0px;
    margin-left: 10px;
    width: 100%;
}

#error{
    display: flex;
    justify-content: center;
    font-size: 30px;
    padding-top: 30px;
}

#errbutton{
    text-decoration: none;
    padding: 6px;
    background: #B1B1B1;
    border-radius: 5px;
    color: black;
    margin: 0 5px;
    outline: solid 1px black;
}

#errbutton:hover{
    background-color: white;
}

.errbutton{
    display: flex;
    justify-content: center;
}
</style>

<?php
    if(isset($_POST['submit'])){
        require_once("server.php");

        if (!empty($_POST['firstname'])) {
            $firstname = trim($_POST['firstname']);    
        }
        if (!empty($_POST['lastname'])) {
            $lastname = trim($_POST['lastname']);
        }
        if ((!empty($_POST['email'])) AND (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
            $email = trim($_POST['email']);    
        } else {
            echo "invalid email format";
        }
        if (!empty($_POST['password'])) {
            $password = trim($_POST['password']);    
        }
        if (!empty($_POST['username'])) {
            $username = trim($_POST['username']);    
        }

        $firstname = mysqli_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_escape_string($conn, $_POST['lastname']);
        $email = mysqli_escape_string($conn, $_POST['email']);
        $password = mysqli_escape_string($conn, $_POST['password']);
        $dob_year = $_POST['dob-year'];
        $dob_month = $_POST['dob-month'];
        $dob_day = $_POST['dob-day'];

        $date_of_birth = $dob_day."-".$dob_month."-".$dob_year;

        $sql1 = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql1 );
        $num_rows = mysqli_num_rows($result);

        if($num_rows > 0){ ?>   
            <div id="navbar">
                <div style="margin-right: 165px;">
                    <a href="projectPHP.php"><img src="logo.png"width="100" height="100"></a>
                </div>
                <div>
                    <h1>Welcome to Voting Center</h1>
                </div>
                <div>
                    <a id="navbutton" href="register.php">Register</a>
                    <a id="navbutton" href="vote.php">Vote</a>
                    <a id="navbutton" href="results.php">View Results</a>
                </div>
            </div>
            <div id="error">
                Error! Email already in use.
            </div>
            <div class="errbutton">
                <a id="errbutton" href="register.php">Retry Registration</a>
            </div>
        <?php 
        die(); 
        }
        else{
            $sql = "INSERT INTO users(firstname, lastname, email, password, date_of_birth, voted)
                    VALUES('$firstname', '$lastname', '$email', '$password', '$date_of_birth', 'no')";
            if(mysqli_query($conn, $sql)){
                header("Location: postRegister.php");
            }
            else{
                echo "Error" .mysqli_error($conn);
            }
        }

        
        mysqli_close($conn);
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Center</title>
</head>
<div id="navbar">
        <div style="margin-right: 165px;">
            <a href="projectPHP.php"><img src="logo.png"width="100" height="100"></a>
        </div>
        <div>
            <h1>Welcome to Voting Center</h1>
        </div>
        <div>
            <a id="navbutton" href="register.php">Register</a>
            <a id="navbutton" href="vote.php">Vote</a>
            <a id="navbutton" href="results.php">View Results</a>
        </div>
</div>

<div id="form">
    <div>
        <form method="post">
            <div id="formHeader">
                Register to Vote
            </div>


            <div id="names">
                <div id="field">
                    <label>First Name<em>*</em> </label><input type="text" name="firstname" required>
                </div>
                <div id="field">
                    <label>Last Name<em>*</em></label> <input type="text" name="lastname" required>
                </div>
            </div>

            <div id="notnames">
                <div>
                    <label>Email<em>*</em></label><br> <input type="email" name="email" required>
                </div>

                <div>
                    <label>Password<em>*</em></label> <input type="password" name="password" required>
                </div>
            </div>

            <div id="dob">
                <h1>Date Of Birth</h1>
                <div id="dob2">
                    <div id="month">
                        <label>Month<em>*</em></label>
                        <div>
                            <select id="dob-month" name="dob-month" style="border-radius: 4px;">
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: row;width: 60%;">
                        <div id="dayYear">
                            <label for="dob-day">Day<em>*</em></label>
                            <input type="number" id="dob-day" name="dob-day" min="1" max="31" placeholder="DD" required>
                        </div>
                        <div id="dayYear" style="margin-right: 10px;">
                            <label for="dob-year">Year<em>*</em></label>
                            <input type="number" id="dob-year" name="dob-year" min="1900" max="2005" placeholder="YYYY" required>
                        </div>
                    </div>
                </div>
            </div>

            <div id="submit">
                <input type="submit" name="submit">
            </div>
        </form>
    </div>
</div>
</html>