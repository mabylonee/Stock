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
        <span class="admin_name">
        <?php   foreach ($data as $app):   ?>
              <?= $app['name'] ?>
              <?php endforeach; ?>
</span>
        </div>
      </nav>
      <section class="ftco-section">
		
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4"><center>Modification Produit</center></h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<form method="POST" id="contactForm" action="{{ asset ('/updateCur/'.$stock_cur->id) }}" name="contactForm" class="contactForm">
                                    @csrf
                    @if(session()->has('message'))
            <div class="alert alert-primary" id="alert" role="alert">
               {{ session()->get('message') }}
            </div>
               @endif
                                                <div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Designation</label>
													<input type="text"  required class="form-control" name="designation" value="{{$stock_cur->designation}}" id="subject" placeholder="Designation" >
												</div>
											    </div>
                                            
               <div class="row">
               <div class="col-md-6">
												<div class="form-group">
													<label class="label"  for="name">Quantité</label>
													<input type="text" class="form-control" required name="qt" value="{{$stock_cur->qt}}" id="name" placeholder="Quantité">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label"  for="name">Quantité(Min)</label>
													<input type="text" class="form-control" required name="qtMin" id="name" value="{{$stock_cur->qtMin}}" placeholder="Quantité(Min)">
												</div>
											    </div>
                                                
                      
                    
											<div class="col-md-12">
                      <center>
						<div class="form-group">
            <button type="submit" class="btn btn-outline-success ">Valider</button>
            <a  href ="/listeCur" class="btn btn-outline-primary ">Retour</a>
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

