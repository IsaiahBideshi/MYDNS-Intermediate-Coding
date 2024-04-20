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

#page{
	display: flex;
	justify-content: center;

	font-size: 30px;
	padding-top: 100px;
}

</style>

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

<div id="page">
	You have successfully registered!
</div>
</html>