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
        <form action="{{route('clients.add')}}" method="post" enctype="multipart/form-data">

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
                <label for="address">address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="gsm">gsm</label>
                <input type="number" class="form-control" id="gsm" name="gsm" placeholder="Enter gsm">
            </div>
            <div class="form-group">
                <label for="telephone">telephone</label>
                <input type="number" class="form-control" id="telephone" name="telephone" placeholder="Enter telephone">
            </div>
            <div class="form-group">
                <label for="ste_name">ste_name</label>
                <input type="text" class="form-control" id="ste_name" name="ste_name" placeholder="Enter ste_name">
            </div>
            <div class="form-group">
                <label for="ste_ice">ste_ice</label>
                <input type="number" class="form-control" id="ste_ice" name="ste_ice" placeholder="Enter ste_ice">
            </div>
            <div class="form-group">
                <label for="ste_rc">ste_rc</label>
                <input type="number" class="form-control" id="ste_rc" name="ste_rc" placeholder="Enter ste_rc">
            </div>

            <div class="form-group">
                <label for="published_at">published_at</label>
                <input type="date" class="form-control" id="published_at" name="published_at" placeholder="Enter published_at">
            </div>

            <div class="form-group">
                <label for="ste_logo">ste_logo</label>
                <input type="file" class="form-control" id="ste_logo" name="ste_logo" placeholder="Enter ste_logo">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>
</body>
</html>
