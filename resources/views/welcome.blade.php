<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <section>
        <div class="conteinder">
            <div class="row">
                <form action="{{ route('encriptarRoute') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Digita tu texto</label>
                      <input type="text" class="form-control" name="texto" aria-describedby="">
                      <label for="exampleInputEmail1" class="form-label">Digita la llave para encriptar</label>
                      <input type="text" class="form-control" name="key" aria-describedby="">
                      <div id="emailHelp" class="form-text">Asegurate que el texto y la llave esten correctas</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Encriptar</button>
                  </form>
            </div>
        </div>
    </section>
</body>
</html>
