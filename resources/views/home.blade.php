<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Aneka Shop</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
      <div class="container">
          <a class="navbar-brand" href="/">Aneka Shop</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
      </div>
  </nav>
  
  <main>
    <div class="container mt-5">
      <div class="row">
          <div class="col-lg-3">
              <h1 class="my-4">Shop Catalog</h1>
              <div class="list-group">
                @foreach ($categories as $category)
                  <a class="list-group-item">
                    {{ $category->name }}
                  </a>
                @endforeach
              </div>

          </div>
          <div class="col-lg-9">
              <div class="row mt-4">
                @foreach ($items as $item)
                  <div class="col-lg-4 col-md-6 mb-4">
                      <div class="card h-100">
                          <a href="#">
                              <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                          </a>
                          <div class="card-body">
                              <h4 class="card-title">
                                <a href="#">{{ $item->name }}</a>
                              </h4>
                              <h5>$ {{ $item->price }}</h5>
                              <p class="card-text">{{ $item->description }}</p>
                          </div>
                      </div>
                  </div>
                @endforeach
              </div>
          </div>
      </div>
    </div>
  </main>
  
  <footer class="footer py-5 bg-success">
      <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Aneka Shop {{ date('Y') }}</p>
      </div>
  </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>