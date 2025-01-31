<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css"> 
</head>
<body class="bg-gray text-light">

    <header class="bg-danger text-center py-2 shadow-lg">
        <img src="/img/header.jpg" alt="Header cinema" class=" border-bottom border-warning animated fadeIn">
    </header>

    <main class="container my-5 p-4 bg-light shadow-lg rounded animated fadeIn">
        {{$slot}}
    </main>

    <footer class="bg-black text-center py-3 mt-5 border-top border-danger">
        <p class="mb-1 text-dark">© 2024 Cinema Joel Mesas. All rights reserved</p>
        <p class="mb-1 text-dark">Created by Joel Mesas</p>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>