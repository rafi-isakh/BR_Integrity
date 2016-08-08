<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php 
  require ('sql_connect.inc');
    //sql_connect('blog');
    $stmt = $conn->prepare("SELECT id_statement, id_policy, definition, p.nama_predikat AS p, q.nama_predikat AS q FROM `br_statement` br INNER JOIN predikat p ON p.id_predikat = br.predikat INNER JOIN predikat q ON q.id_predikat = br.target");
    $stmt->execute();

?>
<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        BR Checking
                    </a>
                </li>
                <li>
                    <a href="policy.php">Policy</a>
                </li>
                <li>
                    <a href="br_statement.php">Business Rule</a>
                </li>
                <li>
                    <a href="predikat.php">Predikat</a>
                </li>
                <li>
                    <a href="rule.php">Aturan</a>
                </li>
                <li>
                    <a href="allreference.php">Referensi</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
            <h4>Predikat</h4>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID Policy</th>
                    <th>ID Statement</th>
                    <th>Definisi</th>
                    <th>Predikat</th>
                    <th>Target</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    while($baris = $stmt->fetch()) {
                  ?>
                  <tr>
                    <td><?php echo $baris['id_policy']; ?></td>
                    <td><?php echo $baris['id_statement']; ?></td>
                    <td><?php echo $baris['definition']; ?></td>
                    <td><?php echo $baris['p']; ?></td>
                    <td><?php echo $baris['q']; ?></td>
                    <td><?php echo '<a href="edit_statement.php?id='.$baris['id_statement'].'">Edit</a>'; ?></td>
                    <td><?php echo '<a href="delete_statement.php?id='.$baris['id_statement'].'">Hapus</a>'; ?></td>
                  </tr>
                  <?php
                    }
                    $conn = null;
                  ?>
                </tbody>
              </table>

              <a href="add_statement.php?">Tambah Business Rule</a>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>