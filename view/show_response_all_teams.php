
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
            <h1>All Teams</h1>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Team ID</th>
                        <th>Team Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($response as $team) { ?>
                        <tr>
                            <td><?php echo $team['teamId']; ?></td>
                            <td><?php echo $team['teamName']; ?></td>

                        </tr>
                    <?php } ?> 
                </tbody>
            </table>
             <a href="../controller/index.php?action=view_home" class="btn btn-success" role="button">Return Home</a>
        </div>




    </body>

</html>
