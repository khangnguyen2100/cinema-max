<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="./assets/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
</head>

<body>
  <header class="header">
    <nav class="container nav">
      <div class="logo">
        <a href="./index.php">
          BK Store
        </a>
      </div>
      <ul class="nav-list">
        <li class="nav-item">
          <a href="./index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="./index.php?page=category" class="nav-link">Category</a>
        </li>
        <li class="nav-item">
          <a href="./index.php?page=movie" class="nav-link">movie</a>
        </li>
        <li class="nav-item">
          <a href="./index.php?page=theader" class="nav-link">theater</a>
        </li>
        <li class="nav-item">
          <a href="./index.php?page=bill" class="nav-link">bill</a>
        </li>
        <li class="nav-item">
          <a href="./index.php?page=user" class="nav-link">user</a>
        </li>
      </ul>
      <ul class="nav-list">
        <li class="nav-item">
          <a href="./view/pages/login.php" class="nav-link">Logout</a>
        </li>
      </ul>
    </nav>
  </header>