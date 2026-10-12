<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/boxicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">


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
    <a  href ="/user" class="btn btn-outline-warning ">Ajouter</a>
    <table class="table table-striped custom-table">
        @if(session()->has('suppression'))
            <div class="alert alert-danger" id="alert" role="alert" >
               {{ session()->get('suppression') }}
            </div>
               @endif
               @if(session()->has('success'))
            <div class="alert alert-success" id="alert" role="alert" >
               {{ session()->get('success') }}
            </div>
               @endif
               @if(session()->has('modification'))
            <div class="alert alert-success" id="alert" role="alert" >
               {{ session()->get('modification') }}
            </div>
               @endif
          <thead>
            <tr>
              <th scope="col">Matricule</th>
              <th scope="col">Agence</th>
              <th scope="col">Nom</th>
              <th scope="col">Role</th>
              <th scope="col">Email</th>
              <th scope="col">Actions</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php   foreach ($dat as $app):   ?>
            <tr scope="row">    
                      <td><?= $app['Matricule']?></td>
                      <td> <?= $app['Agence']?></td>
                      <td> <?= $app['name']?></td>
                      <td> <?= $app['Role']?></td>
                      <td> <?= $app['email']?></td>
                     
                      <td><ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                <a href="{{ asset ('/listeUser/'.$app->id ) }}" onclick="return  confirm('voulez vous vraiment supprimer cette ligne')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                
												<a href="{{ asset ('/modPassword/'.$app->id) }}" class="btn btn-dark"><i class="fa fa-edit"></i></a>
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
    <script >
		setTimeout(function () {

			// Closing the alert
			$('#alert').alert('close');
		}, 3000);
	</script>
  </body>
</html>