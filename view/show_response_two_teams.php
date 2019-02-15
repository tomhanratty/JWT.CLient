
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

       <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> ID</th>
                        <th>gamedate</th>
                        <th>hometeam</th>
                        <th>home-goals</th>
                        <th>away-goals</th>
                        <th>away-team </th>
                        <th>attendence</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($response as $singleresult) { ?>
                        <tr>
                            <td><?php echo $singleresult['Id']; ?></td>
                            <td><?php echo $singleresult['gameDate']; ?></td>
                            <td><?php echo $singleresult['homeTeam']; ?></td>
                            <td><?php echo $singleresult['homeGoal']; ?></td>
                            <td><?php echo $singleresult['awayGoal']; ?></td>
                            <td><?php echo $singleresult['awayTeam']; ?></td>
                            <td><?php echo $singleresult['attendance']; ?></td>

                        </tr>
                    <?php } ?> 
                </tbody>
            </table>
       
         <a href="../controller/index.php?action=view_home" class="btn btn-success" role="button">Return Home</a>
    </body>

</html>