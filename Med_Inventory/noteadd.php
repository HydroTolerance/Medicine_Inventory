<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="main">
            <div class="sub">
                <h2 align="center">Add Note</h2>
                <p class="reg" align="center">Please fill in the following fields</p>
            </div>
            <div class="container d-flex align-items-center justify-content-center">
            <form name="reg" method="POST" action="addnote.php">
                

                <label for="FIRSTNAME">Notes</label>
                <input class="form-control form-control-lg" class="input" type="FIRSTNAME" id="FIRSTNAME" name="FIRSTNAME" required><br>

                <input  name="submit" type="submit" value="Register" action="addnote.php">
            </form>
            </div>

        </div>

    </body>
</html>