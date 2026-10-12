<!doctype html>
<html lang="en">
  <head>
  <title>GStock</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css" />
  <!-- Boxicons CDN Link -->
	<!-- Including Bootstrap JS -->
  <link rel="stylesheet" href="/css/boxicons.min.css" />
	<link rel="stylesheet" href="/css_formulaire/style.css">

	</head>
	<body>
    @include("menu")

    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Modification</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name"></span>
        </div>
      </nav>
      <section class="ftco-section">
		
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4"><center>Modification Mot de passe</center></h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<form method="POST" id="contactForm" action="{{ asset ('/updatePassword/'.$Password->id) }}" name="contactForm" class="contactForm">
                                    @csrf
                    @if(session()->has('message'))
            <div class="alert alert-primary" id="alert" role="alert">
               {{ session()->get('message') }}
            </div>
               @endif
               @if(session()->has('modification'))
            <div class="alert alert-danger" id="alert" role="alert">
               {{ session()->get('modification') }}
            </div>
               @endif
                                                <div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Mot de passe</label>
													<input  type="Password" required class="form-control" name="Password" id="subject" placeholder="Mot de passe" >
												</div>
											    </div>  
                                                <div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Confirmer mot de passe</label>
													<input type="Password"  class="form-control" name="confPassword" id="subject" placeholder="Confirmer mot de passe" >
												</div>
											    </div>                                 
                      
                    
											<div class="col-md-12">
                      <center>
						<div class="form-group">
            <button type="submit" class="btn btn-outline-success ">Valider</button>
            <a  href ="/listeUser" class="btn btn-outline-primary ">Retour</a>
            <br/><br/>
						<div class="submitting"></div>
						</div> 
            </center> 
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

