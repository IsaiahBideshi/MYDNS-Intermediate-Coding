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
    color: white;
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

input{
    height: 40px;
    font-size: 18px;
    padding-left: 10px;
    border-radius: 4px;
    width: 100%;
}

form{
    display: flex;
    flex-direction: column;
    background-color: white;
    border-radius: 10px;
    outline: solid 4px black;
}

em{
    color: red;
}

#form{
    margin: 0 auto;
    margin-top: 50px;
    width: 30%;
}

#formHeader{
    padding-top: 10px;
    text-align: center;
    height: 100px;
    background: #252424;
    color: white;
    font-size: 30px;
}

#field{
    margin: 10px 10px 10px;
}

#submit{
    padding: 50px 50px 5px 50px;
}

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Center</title>
</head>
<div id="navbar">
        <div>
            <a href="projectPHP.php"><img src="logo.png"width="100" height="100"></a>
        </div>
        <div>
            <h1>Welcome to Voting Center</h1>
        </div>
        <div>
            <a id="navbutton" href="register.php">Register</a>
            <a id="navbutton" href="login.php">Login</a>
            <a id="navbutton" href="vote.php">Vote</a>
            <a id="navbutton" href="results.php">View Results</a>
        </div>
    </div>
<div id="form">
    <div>
        <form>
            <div id="formHeader">
                Register to Vote
            </div>
            <div id="field">
                <div>
                    <label>Email<em>*</em></label><br> <input type="email" name="email">
                </div>

                <div>
                    <label>Password<em>*</em></label> <input type="password" name="password">
                </div>
            </div>

            <div id="submit">
                <input  type="submit">
            </div>
        </form>
    </div>
</div>
</html>