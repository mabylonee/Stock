<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
 
 <link rel="stylesheet" href="css/font-awesome.min.css">
 <link rel="stylesheet" href="style.css" />
 <link rel="stylesheet" href="css/boxicons.min.css" />
 <link rel="stylesheet" href="fonts/icomoon/style.css">
 <link rel="stylesheet" href="css/owl.carousel.min.css">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/style.css">

    <title>GStock</title>
  </head>
  <body>
  @include("menu")

    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Produit sortant</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
        <span class="admin_name">
        <?php   foreach ($data as $app):   ?>
              <?= $app['name'] ?>
              <?php endforeach; ?>
</span>
        </div>
      </nav>
  <div class="content">
    <div class="container">
    <a  href ="/stock_out" class="btn btn-outline-warning ">Ajouter</a>
  <div class="table-responsive">
        <table class="table table-striped custom-table">
        @if(session()->has('message'))
            <div class="alert alert-success" id="alert" role="alert">
               {{ session()->get('message') }}
            </div>
               @endif
          <thead>
            <tr> 
              <th scope="col" >Agence</th>
              <th scope="col">Designation</th>
              <th scope="col">Quantite</th>
              <th scope="col">Date Sortie</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php   foreach ($stock_out as $app):   ?>
            <tr scope="row">    
                      <td><?= $app['agence']?></td>
                      <td> <?= $app['designation']?></td>
                      <td> <?= $app['qt']?></td>
                      <td> <?= $app['date_out']?></td>
                      <td><ul class="list-inline m-0">
                                               
                      <button type="button"  class="btn btn-dark"><a   href="{{ asset ('/impressionOut/'.$app->num_bs ) }}"  class="btnPrintOut"><i class="fa fa-print"></i></a></button>
                                               </ul></td>
                         
            </tr>
              <?php endforeach; ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<!-- <script type= text/javascript src="js/jquery.printPage.js"></script>
<script type= text/javascript src="js/jquery.min_impression.js"></script> -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.printPage.js"></script>
  <script>
$(document).ready(function() {
    $('.btnPrintOut').printPage();
    
});
</script>
  <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- <script src="js/jquery.printPage.js"></script>
    <script src="js/jquery.min_impression.js"></script> -->


    <script >
		setTimeout(function () {

			// Closing the alert
			$('#alert').alert('close');
		}, 3000);
	</script>

  </body>
</html>