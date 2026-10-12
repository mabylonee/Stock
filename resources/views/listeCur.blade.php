<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
<meta charset="utf-8">

    <link rel="stylesheet" href="css/boxicons.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>GStock</title>
  </head>
  <body>
  @include("menu")

    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Stock initial </span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name">     <?php   foreach ($data as $app):   ?>
              <?= $app['name'] ?>
              <?php endforeach; ?>
</span>
        </div>
      </nav>

  <div class="content">
    <div class="container">
    <a  href ="/stock_cur" class="btn btn-outline-warning ">Ajouter</a>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;<button type="button"  class="btn btn-dark"><a  href="/impression"  class="btnPrint"><i class="fa fa-print"></i></a></button>

      <div class="table-responsive">
        <table class="table table-striped custom-table">
        @if(session()->has('message'))
            <div id="alert" class="alert alert-success" role="alert" >
               {{ session()->get('message') }}
            </div>
               @endif
               @if(session()->has('modification'))
            <div id="alert" class="alert alert-success" role="alert" >
               {{ session()->get('modification') }}
            </div>
               @endif
               @if(session()->has('suppression'))
            <div id="alert" class="alert alert-danger" role="alert" >
               {{ session()->get('suppression') }}
            </div>
               @endif
          <thead>
            <tr>
              <th scope="col">Designation</th>
              <th scope="col">Quantite</th>
              <th scope="col">Quantite Min</th>
              <th scope="col">Actions</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php   foreach ($stock_cur as $app):   ?>
            <tr scope="row">    
                      <td> <?= $app['designation']?></td>
                      <td> <?= $app['qt']?></td>
                      <td> <?= $app['qtMin']?></td>
                      <td><ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                <a href="{{ asset ('/listeCur/'.$app->id ) }}" onclick="return  confirm('voulez vous vraiment supprimer cette ligne')" class="btn btn-danger"><i class="fa fa-trash"></i></a></li>
                                                <li class="list-inline-item">
												<a href="{{ asset ('/modCur/'.$app->id) }}" class="btn btn-dark"><i class="fa fa-edit"></i></a>
                                                </li></ul></td>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.printPage.js"></script>
    <script>
$(document).ready(function() {
    $('.btnPrint').printPage();
    
});
</script>
<script >
		setTimeout(function () {

			// Closing the alert
			$('#alert').alert('close');
		}, 3000);
	</script>
</body>
</body>
</html>