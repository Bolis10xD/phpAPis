<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Noticias Cloudflare </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>

        img{
            width: calc(100% - 20px);
            height: 250px;
            margin: 10px;

        }
        .NewsGrid{
            margin: 10px;
            border: 1px solid lightgray;
            padding: 10px;
        }
        .container-fluid{
            width: 90%;
        }

    </style>


    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="uatx.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        <h1">Universidad Autónoma de Tlaxcala<h1>
      </a>
    </nav>
</head>
<body>
    
    <?php

        $url= 'http://newsapi.org/v2/everything?q=apple&from=2020-03-04&to=2020-03-04&sortBy=popularity&apiKey=9ffe3fe1ce3e42368ad4c3827b95fa7a'; 

        $response = file_get_contents($url);
        $nuevosDatos = json_decode($response);

    ?>

    <div class="card bg-light">

        <?php 
           foreach($nuevosDatos->articles as $nuevos)
           {

        ?>
        <div class="row NewsGrid">
                <div class="col-md-3"><img src="<?php echo $nuevos->urlToImage  ?>" alt="News thumbnail " class="rounded"></div>
                <div class="col-md-9">
                    <div class="card-header"><h2><?php  echo $nuevos->title ?></h2></div>



                    <h5><strong><?php  echo $nuevos->description ?></strong></h5>
                    <p><i>Contenido: <?php echo $nuevos->content ?></


                    i></p>
                    <h6><u>Author: <?php echo $nuevos->author ?></u></h6>
                    <h6>Publicidad: <?php  echo $nuevos->publishedAt?></h6>

                    </table>
                </div>
        </div>
        <?php
           }
        ?>
    
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>