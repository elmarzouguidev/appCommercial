<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">
    {{$errors}}
    <div class="row mt-5">
        <form action="{{route('admin.add')}}" method="post">

            @csrf
            <div class="form-group">
                <label for="nom">nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter nom">
            </div>
            <div class="form-group">
                <label for="prenom">prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter prenom">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="telephone">telephone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter telephone">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            </div>

            <div class="form-group">
                <label for="super_admin">super_admin</label>
                <input type="checkbox" class="form-control" id="super_admin" name="super_admin" placeholder="super_admin">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>
</body>
</html>
