<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body{
            background-image: url("https://static.vecteezy.com/system/resources/previews/002/284/911/non_2x/hand-drawn-sketch-on-the-theme-of-literature-set-of-stacks-of-paper-books-home-library-bookshelf-and-pen-with-ink-doodle-elements-school-concept-of-education-book-time-engraving-sketch-vector.jpg");
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-4 offset-4">
            <div class="card mt-5 shadow-sm">
                <div class="card-header">
                    @yield('form-heading')
                </div>
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>
