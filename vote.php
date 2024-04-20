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

.logo{
    align-self: left;
    border-radius: 50px;
    width: 10%;
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

.row{
    display: flex;
    flex-direction: row;
    padding: 50px;
    border-bottom: 1px solid black;
    border-left: 120px solid transparent;
    border-right: 120px solid transparent;
}

.rowTitle{
    display: flex;
    justify-content: center;
    font-size: 40px;
    font-weight: bold;
    padding-top: 20px;
}

.rowImg{
    width: 40%;
}

.rowImg img{
    width: 100%;
}

.rowContent{
    width: 60%;
    padding-left: 20px;
    font-size: 25px;
}

.voteButton{
    font-style: normal;
    outline: solid 1px black;
    border-radius: 5px;
    font-size: 20px;
    width: auto;
    height: 25px;
    margin-top: 10px;
    margin-left: 20px;
    padding-left: 10px;
    padding-right: 10px;
    background-color: white;
}

input[type="radio"]{
    display: none;
}

input[type="radio"]:checked+.voteButton{
    background-color: #0d6efd;
    color: white;
}

input[type="submit"]{
    border-radius: 5px;
    align-self: center;
    width: 100px;
    height: 30px;
}

input[type="text"]{
    height: 40px;
    font-size: 18px;
    padding-left: 10px;
    border-radius: 4px;
    width: 100%;
}

em{
    color: red;
}



#submitbutton{
    padding: 50px 50px 5px 50px;
}

#formHeader{
    padding-top: 10px;
    text-align: center;
    height: 100px;
    background: #252424;
    color: white;
    font-size: 30px;
}


#footer1{
    height: 850px;
}
#footer{
    margin: auto;
    margin-top: 50px;
    width: 30%;
    display: flex;
    flex-direction: column;
    background-color: white;
    border-radius: 10px;
    outline: solid 4px black;

}

#fields{
    display: flex;
    flex-direction: column;
}

#form{
    display: flex;
    flex-direction: column;
    background-color: white;
    padding: 10px;
}

input[type="email"], input[type="password"]{
    height: 40px;
    font-size: 18px;
    padding-left: 10px;
    border-radius: 4px;
    width: 100%;
}

input[type="submit"]{
    height: 40px;
    font-size: 18px;
    padding-left: 10px;
    border-radius: 4px;
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

    if(!$_POST['vote']){
        header("Location: noneSelected.php");
    }
    $vote = $_POST['vote'];

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);

    if(!($num_rows > 0)){?>
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
            Error! No account found or incorrect password
        </div>
        <div class="errbutton">
            <a id="errbutton" href="vote.php">Retry Vote</a>
        </div>
        <?php
        die();
    }

    $rest = $_POST['vote'];
    $sql1 = "SELECT votes FROM restaurants WHERE id = '$rest'";
    $result1 = mysqli_query($conn, $sql1);

    $sql2 = "SELECT voted FROM users WHERE email = '$email'";
    $result2 = mysqli_query($conn, $sql2);

    if(mysqli_fetch_assoc($result2)['voted'] == "yes"){?>
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
            Error! This account has already voted.
        </div>
        <div id="error">
            Try registering with a new account.
        </div>
        <div class="errbutton">
            <a id="errbutton" href="register.php">Register</a>
        </div>
        <?php
        die();
    }


    if (mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_assoc($result1);

        $voteses = $row1['votes'] + 1;
        $sql2 = "UPDATE restaurants SET votes = '$voteses' WHERE id = '$rest'";

        if (mysqli_query($conn, $sql2)) {
            echo "";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        $sql2 = "UPDATE users SET voted = 'yes' WHERE email = '$email'";
        if (mysqli_query($conn, $sql2)) {
            echo "";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }?>

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
            You have successfully voted. You can no longer vote again on this account.
        </div>
        <?php
        die(); 
    }
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
<form method="post">
    <div class="rowTitle">
        <div>
            Savor Haven
        </div>
        <label for="r1">
            <input value="1" id="r1" type="radio" name="vote">
            <div class="voteButton">
                Vote
            </div>
        </label>
    </div>
    <div class="row">
        <div class="rowImg">
            <img src="restaurant1.png">
        </div>
        <div class="rowContent">
            Indulge in fusion delights at Savor Haven, where each dish is a blend of tradition and innovation. With impeccable service and a cozy ambiance, every visit is a culinary celebration.
        </div>
    </div>



    <div class="rowTitle">
        <div>
            Spice Boulevard
        </div>
        <label for="r2">
            <input value="2" id="r2" type="radio" name="vote">
            <div class="voteButton">
                Vote
            </div>
        </label>
    </div>
    <div class="row">
        <div class="rowContent">
            Dive into the rich tapestry of Indian cuisine at Spice Boulevard. From fiery curries to aromatic biryanis, every bite is an adventure for the senses. Experience warmth and vibrancy in every dish.
        </div>
        <div class="rowImg">
            <img src="restaurant2.png">
        </div>
    </div>




    <div class="rowTitle">
        <div>
            Green Eats Bistro
        </div>
        <label for="r3">
            <input value="3" id="r3" type="radio" name="vote">
            <div class="voteButton">
                Vote
            </div>
        </label>
    </div>
    <div class="row">
        <div class="rowImg">
            <img src="restaurant3.png">
        </div>
        <div class="rowContent">
            Discover wholesome goodness at Green Eats Bistro, where fresh, sustainable ingredients take center stage. Nourish your body and the planet with every delicious, plant-based bite.
        </div>
    </div>





    <div class="rowTitle">
        <div>
            Fusion Fare
        </div>
        <label for="r4">
            <input value="4" id="r4" type="radio" name="vote">
            <div class="voteButton">
                Vote
            </div>
        </label>
    </div>
    <div class="row">
        <div class="rowContent">
            Experience culinary fusion at its finest at Fusion Fare, where East meets West in a symphony of flavors. With creative cocktails and a lively atmosphere, every meal is an exploration of taste.
        </div>
        <div class="rowImg">
            <img src="restaurant4.png">
        </div>
    </div>





    <div class="rowTitle">
        <div>
            Rustic Roots Tavern
        </div>
        <label for="r5">
            <input value="5" id="r5" type="radio" name="vote">
            <div class="voteButton">
                Vote
            </div>
        </label>
    </div>
    <div class="row">
        <div class="rowImg">
            <img src="restaurant5.png">
        </div>
        <div class="rowContent">
            Find comfort in hearty fare at Rustic Roots Tavern, where every dish embodies the flavors of the countryside. Gather with friends and enjoy live music in a cozy, welcoming atmosphere.
        </div>
    </div>


    <div id="footer1">
        <div id="footer">
            <div id="formHeader">
                Login before voting
            </div>
            <div id="form">
                <div id="fields">
                    <label>Email<em>*</em></label> <input type="email" name="email" required>
                </div>

                <div id="fields">
                    <label>Password<em>*</em></label> <input type="password" name="password" required>
                </div>

                <div id="submitbutton">
                    <input type="submit" name="submit">
                </div>
            </div>
        </div>
    </div>
</form>
</html>