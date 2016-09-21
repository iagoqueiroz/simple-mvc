<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <base href="http://localhost/simple-mvc/public/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Livros - Novo</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1 class="text-center">Livros - Novo Livro</h1>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="" method="POST" class="form-horizontal" style="background-color: #f5f5f5; padding: 20px">
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Nome</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-2 control-label">Descrição</label>
                            <div class="col-md-10">
                                <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-2 control-label">Preço</label>
                            <div class="col-md-10">
                                <input type="number" name="price" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <input type="submit" name="novo-livro" class="btn btn-primary" value="Novo">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>