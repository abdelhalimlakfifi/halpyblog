<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Article | HalpyBlog</title>
</head>
<body>
    <h1> <a href="{{ url('/articles/'.$datas['id']) }}"> {{ $datas['title'] }} </a></h1>
    <p> {{ substr($datas['body'],0,150)."..." }} </p>
    
</body>
</html>