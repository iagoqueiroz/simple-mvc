<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="http://localhost/simple-mvc/public/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Simple MVC - Home</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Simple MVC</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="users">Usuários</a></li>
            <li><a href="livros">Livros</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <main class="listing">
        <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-th-list"></i> All Books
                        <a href="" class="btn btn-xs btn-primary pull-right">Add new</a>
                    </div>

                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($livros as $livro): ?>
                                <tr>
                                    <td><?=$livro->id?></td>
                                    <td><?=$livro->name?></td>
                                    <td><?=$livro->description?></td>
                                    <td><?=$livro->price?></td>
                                    <td>
                                        <a href="livros/edit/<?=$livro->id?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                        <a href="livros/delete/<?=$livro->id?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>