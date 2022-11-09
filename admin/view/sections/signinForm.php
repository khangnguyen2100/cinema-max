<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BK Store - Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;1,900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
  <div class="container-form">
    <div class="bg-blur">
      <form action="../module/signinAdmin.php" method="POST" class="form">
        <h2 class="heading-form">
          Log in
        </h2>
        <div class="form-group">
          <label for="name">
            Servername
          </label>
          <input type="text" id="name" name="username">
        </div>

        <div class="form-group">
          <label for="password">
            Password
          </label>
          <input type="password" id="password" name="password">
        </div>
        <div class="form-group">
          <input type="submit" name="signinForm" value='Log in' class="btn-bg-form btn-form" />
        </div>
      </form>
    </div>
  </div>
</body>

</html>