<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container-fluid text-center agency-header">
    <div class="row">
        <div class="col py-5">
            <h1>H Agency</h1>
            <h3>here you will find all the Model you are looking for</h3>
        </div>
    </div>
</div>
<div class="login-form">
    <form method="POST">
        <div class="mb-3">
            <label class="form-check-label">
                <a href="/home/index" for="exampleCheck1">Visit website as a guest</a>
            </label><br><br>
            <input type="email" name="email" class="form-control"/>
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <input type="password" name="hashedPassword" class="form-control"/>
            <label for="exampleInputPassword1" class="form-label">Password</label>
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label">
                <a href="/login/register" for="exampleCheck1">Register</a>
            </label>
        </div>
        <input type="submit" name="loginBtn" class="btn btn-primary" value="Log in">
    </form>
</div>
</body>




