<!doctype html>
<html lang="en">
  <head>
  <title>GStock</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/boxicons.min.css" />
    <link rel="stylesheet" href="css_formulaire/style.css">

	</head>
	<body>
  @include("menu")
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Nouveau produit</span>
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
      
	<section class="ftco-section">
		
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4"><center>Nouveau Produit</center></h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<form method="POST" id="contactForm" action="/stock_cur" name="contactForm" class="contactForm">
                                    @csrf
                                    @if(session()->has('alert'))
            <div class="alert alert-danger"  id="alert" role="alert">
               {{ session()->get('alert') }}
            </div>
               @endif
                    @if(session()->has('message'))
            <div class="alert alert-primary" role="alert">
               {{ session()->get('message') }}
            </div>
               @endif
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Designation</label>
													<input type="text" required name="designation" class="form-control" id="message" cols="30" rows="4" placeholder="Designation">
												</div>
											</div>
                      <div class="col-md-12"> 
												<div class="form-group">
													<label class="label" required for="email">Quantité(Min)</label>
													<input type="number" min="00" max="10000" required class="form-control" name="qtMin" id="email" placeholder="Quantité(Min)">
												</div>
											</div>
											
											<div class="col-md-12">
						<div class="form-group">
              <center>
            <button type="submit" class="btn btn-outline-success ">Valider</button>
            <a  href ="/listeCur" class="btn btn-outline-primary ">Retour</a>
             </center>
<br/><br/>
						<div class="submitting"></div>
						</div>  
</div>
</div>
</form>	
</div>
</div>
</section>
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

