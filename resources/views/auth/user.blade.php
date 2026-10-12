<!doctype html>
<html lang="en">
  <head>
  <title>GStock</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />
	  <link rel="stylesheet" href="css_formulaire/style.css">
    <link rel="stylesheet" href="css/boxicons.min.css" />

	</head>
	<body>
  <style>
  select {width: 20em;}
</style>
    <div class="sidebar">
      <div class="logo-details">
      
        <span class="logo_name"><img src="logo-bim.jpg"></span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="index" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Tableau de bord</span>
          </a>
        </li>
        <li>
          <a href="listeCur">
            <i class="bx bx-box"></i>
            <span class="links_name">Stock initial</span>
          </a>
        </li>
        <li>
          <a href="listeIn">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Produit entrant</span>
          </a>
        </li>
        <li>
          <a href="listeOut">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Produit sortant </span>
          </a>
        </li>
        <li>
          <a href="listeBon">
          <i class="bx bx-box"></i>
            <span class="links_name">Bon de commande </span>
          </a>
        </li>
        <li>
          <a href="user">
          <i class="bx bx-box"></i>
            <span class="links_name">Utilisateur </span>
          </a>
        </li>
        <li>
          <a href="profil">
            <i class="bx bx-cog"></i>
            <span class="links_name">Paramétres</span>
          </a>
        </li>
        <li class="log_out">
        <a href="{{ route('auth.logout') }}">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Utilisateur</span>
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
      
	<section class="ftco-section">
    <center>
		
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4"><center>Nouveau Utilisateur</center></h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<form   method="POST" id="contactForm" action="{{ route('auth.save') }}"  class="contactForm" >
                  @if(Session::get('success'))
             <div class="alert alert-success" id="alert" role="alert">
                {{ Session::get('success') }}
             </div>
           @endif

           @if(Session::get('fail'))
             <div class="alert alert-danger" id="alert" role="alert">
                {{ Session::get('fail') }}
             </div>
           @endif
           @csrf
               
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label"  for="name">Agence</label>
                                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"   name="Agence">
                                                    <option value="">Veuillez sélectionner!</option>
                                                    <?php   foreach ($agences as $app):   ?>
                                                    <option value="<?= $app['ag_desc']?>"><?= $app['ag_desc']?></option>
                                                    <?php endforeach; ?>
                                                    </select>		
          										                     </div>
											                             </div>
                                               
                       <div class="col-md-6">
                        <div class="form-group">
                        <label class="label" for="#">Departement</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name=" dep"  required  >
                        <option value="">Veuillez sélectionner!</option>
                                                    <?php   foreach ($departement as $app):   ?>
                                                    <option value="<?= $app['dep_desc']?>" name="dep"><?= $app['dep_desc']?></option>
                                                    <?php endforeach; ?>
                                                    </select>		 </div>
                                                    </div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="subject">Role</label>
													<input type="text"  required class="form-control" name="Role" id="subject" placeholder="Role" >
												</div>
											</div>
                      <div class="col-md-6">
												<div class="form-group">
													<label class="label" for="subject">Date Recrutement</label>
													<input type="date"  required class="form-control" name="rec_date" id="subject" placeholder="Date" >
												</div>
											</div><div class="col-md-6">
												<div class="form-group">
													<label class="label" for="subject">Nom</label>
													<input type="text"  required class="form-control" name="name" id="subject" placeholder="Nom" >
												</div>
                        </div><div class="col-md-6">
                        <div class="form-group">
													<label class="label" for="subject">Matricule</label>
													<input type="text"  required class="form-control" name="Matricule" id="subject" placeholder="Matricule" >
												</div>
											</div><div class="col-md-6">
												<div class="form-group">
													<label class="label" for="subject">Email</label>
													<input type="email"  required class="form-control" name="email" id="subject" placeholder="Email" >
												</div>
											</div><div class="col-md-6">
												<div class="form-group">
													<label class="label" for="subject">Mot de passe</label>
													<input type="Password"  required class="form-control" name="Password" id="subject" placeholder="Mot de passe" >
                          <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                        </div>
											</div>
            <div class="col-md-12">
						<div class="form-group">
            <button type="submit" class="btn btn-outline-success ">Valider</button>
            <a  href ="/listeUser" class="btn btn-outline-primary ">Retour</a>

<br/><br/>
						<div class="submitting"></div>
						</div>                        
</div>
</div>
</form>	
</div>
</div> 
</section>

<!-- JavaScript -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script >
		setTimeout(function () {

			// Closing the alert
			$('#alert').alert('close');
		}, 3000);
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
</body>
</html>
