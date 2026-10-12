<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/boxicons.min.css" />


    <title>GStock</title>
  </head>
  <body>
  @include("menu")

    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Produit entrant </span>
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
    <a  href ="/stock_in" class="btn btn-outline-warning ">Ajouter</a>
    <table class="table table-striped custom-table">
        @if(session()->has('message'))
            <div class="alert alert-success" id="alert" role="alert" >
               {{ session()->get('message') }}
            </div>
               @endif
          <thead>
            <tr>
              <th scope="col">Agence</th>
              <th scope="col">Designation</th>
              <th scope="col">Quantite</th>
              <th scope="col">Date Entrer</th>
              <th scope="col">Fournisseur</th>
              <th scope="col">N° facture</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php   foreach ($stock_in as $app):   ?>
            <tr scope="row">    
                      <td><?= $app['agence']?></td>
                      <td> <?= $app['designation']?></td>
                      <td> <?= $app['qte']?></td>
                      <td> <?= $app['date_in']?></td>
                      <td> <?= $app['fournisseur']?></td>
                      <td> <?= $app['Num_facture']?></td>    
            </tr>
              <?php endforeach; ?>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
    
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
    <script >
		setTimeout(function () {

			// Closing the alert
			$('#alert').alert('close');
		}, 3000);
	</script>
  </body>
</html>