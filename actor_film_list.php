

 <!-- $data=$con->query("select title,release_year, language.name as 'film language',first_name,rating 
 from actor left join film_actor on film_actor.actor_id=actor.actor_id
 left join film on film_actor.film_id=film.film_id left join language on language.language_id=film.language_id
 where actor.actor_id=$_GET[actor_id]"); -->

 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<div class="container">
        <table class="table table-bordered  table-striped" >
            
            <thead >
                <tr>
                    
                    <th scope="col">movie name</th>
                    <th scope="col">release year</th>
                    <th scope="col">language</th>
                    <th scope="col">actor name</th>
                    <th scope="col">rating</th>
                    <th scope="col">category name</th>


                </tr>
            </thead>
            <?php
            $index = 0;
            $con = new mysqli('localhost', 'root', '', 'sakila');
            
            $blank=$_GET["id"]??header('Location: actor_list.php');
            $result = $con->query("select title,release_year, language.language_id, category.category_id , category.name as 'catname', language.name as 'film language',first_name,rating 
            from actor left join film_actor on film_actor.actor_id=actor.actor_id
            left join film on film_actor.film_id=film.film_id left join language on language.language_id=film.language_id
            left join film_category on film.film_id=film_category.film_id left join category on film_category.category_id=category.category_id
            WHERE film_actor.actor_id=$blank");

            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>

                    <td><?= $row["title"]; ?></td>
                    <td><?= $row["release_year"]; ?></td>
                    <td><a href="language_list.php?lid=<?=($row['language_id']);?>"><?= $row["film language"]; ?></a></td>
                    <td><?= $row["first_name"]; ?></td>
                    <td><?= $row["rating"]; ?></td>
                    <td><a href="category_list.php?cid=<?=($row['category_id']);?>"><?= $row["catname"]; ?></a></td>
                </tr>
            <?php  }
            ?>
            <tbody>
        </table>
    </div>
    </body>

</html>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>