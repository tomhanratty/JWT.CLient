
<html lang="en">
    <head>
        <title>League of Ireland</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="jumbotron text-center">
            <h1>League of Ireland Results</h1>
            <p>Please Log in or Register</p> 
        </div>

        <h1>Login</h1>
        <form action="../controller/index.php" method="POST" id="request_token_form">
            <input type="hidden" name="action" value="login">
            
           
            
            
            <input type="text" name="userName" placeholder="Enter User Name" required />
            <br>
            <input type="text" name="password" placeholder="Enter Password" required />
            <br>
            
            
            <label>&nbsp;</label>
            <input type="submit" value="login" />
            <br>
        </form>
        
        <form action="../controller/index.php" method="POST" id="request_token_form">
            <input type="hidden" name="action" value="show_req_register">
            
          
            
            <label>&nbsp;</label>
            <input type="submit" value="register" />
            <br>
        </form>

       

    </body>

</html>
