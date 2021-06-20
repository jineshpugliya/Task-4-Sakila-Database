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
                    
                    <th scope="col">Customer id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address id</th>
                    <th scope="col">Store id</th>


                </tr>
            </thead>
            <?php
            $index = 0;
            $con = new mysqli('localhost', 'root', '', 'sakila');
            $result = $con->query("select distinct(customer.customer_id), first_name, last_name, email, address_id, store_id from customer 
                                left join payment on customer.customer_id=payment.customer_id
                                where customer.customer_id=$_GET[cid]");

            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>

                    <td><?= $row["customer_id"]; ?></td>
                    <td><?= $row["first_name"]; ?> <?= $row["last_name"]; ?></a></td>
                    <td><?= $row["email"]; ?></td>
                    <td><a href="address_list.php?aid=<?=($row['address_id']);?>"><?= $row["address_id"]; ?></td>
                    <td><a href="store_list.php?sid=<?=($row['store_id']);?>"><?= $row["store_id"]; ?></a></td>


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

<!-- 
  -->