<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user HOme</title>
</head>

<body>
    <form action="{{ route('custom.logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>

</html>
