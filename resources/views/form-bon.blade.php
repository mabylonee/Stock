<!doctype html>
<html lang="en">
  <head>
  <title>GStock</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/boxicons.min.css" />
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />
	  <link rel="stylesheet" href="css_formulaire/style.css">

	</head>
	<body>
  <style>
  select {width: 20em;}
</style>
   @include("menu")
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Bon de commande</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name"> <?php   foreach ($data as $app):   ?>
              <?= $app['name'] ?>
              <?php endforeach; ?></span>
          <i class="bx bx-chevron-down"></i>
        </div>
      </nav>
      
	<section class="ftco-section">
    <center>
		
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4"><center>Bon de commande</center></h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<form   method="POST" id="contactForm" action="/form-bon" name="contactForm" class="contactForm"  enctype="multipart/form-data">
                  @csrf
        
               @if(session()->has('error'))
            <div class="alert alert-danger" id="alert" role="alert">
               {{ session()->get('error') }}
            </div>
               @endif
               
										<div class="row">
                                        <div class="col-md-6">
                        <div class="form-group">
                        <label class="label" for="#">Destinataire</label>
                        <input type="text"  required class="form-control" name="destinataire" id="subject" placeholder="Destinataire" >
														 </div>
                                                    </div>
										
                                            <div class="col-md-6">
												<div class="form-group">
													<label class="label"  for="name">Code</label>
                                                    <input type="text"  required class="form-control" name="code" id="subject" placeholder="Code" >
												
          										                     </div>
											                             </div>
                                                                         <div class="col-md-6">
												<div class="form-group">
													<label class="label" for="subject">Autorisation</label>
													<input type="text"  required class="form-control" name="autorisation" id="subject" placeholder="Autorisation" >
												</div>
											</div>
                                            <div class="col-md-6">
												<div class="form-group">
													<label class="label" for="subject">Modalité</label>
													<input type="text"  required class="form-control" name="modalite" id="subject" placeholder="Modalité" >
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
                                                <table class="table table-bordered" id="dynamicAddRemove">
                <tr>     
<td><input type="text"  required class="form-control" name="addMoreInputFields[0][description]" id="qtE" placeholder="Description"></td>
<td><input type="number" min="1" required class="form-control" name="addMoreInputFields[0][qt]" id="qtE" placeholder="Quantite"></td>
<td><input type="number" min="1"  required class="form-control" name="addMoreInputFields[0][prixUnit]" id="qtE" placeholder="Prix"></td>
<td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Ajouter</button></td>
</tr>
</table>
          										                     </div>
											                             </div>
                                               
                    
                                               
                        <div class="col-md-6">
                        <div class="form-group">
                        <label class="label" for="#">TVA</label>
                        <input type="number" min="0"  class="form-control" name="tva" id="subject" placeholder="TVA" >
											</div>
                                            </div>
                                            <div class="col-md-6">
                        <div class="form-group">
                        <label class="label" for="#">Sous-total</label>
                        <input type="number" min="0"  required class="form-control" name="sousTotal" id="subject" placeholder="Sous Total" >
												</div>
                                                </div>
                                                <div class="col-md-6">
												<div class="form-group">
													<label class="label" for="subject">Total Géneral</label>
													<input type="number"  min="0" max="10000000" required class="form-control" name="totalGeneral" id="subject" placeholder="Total Géneral" >
											</div>
											</div>
                                            <div class="col-md-6">
                        <div class="form-group">
                        <label class="label" for="#">Total</label>
                        <input type="text"  required class="form-control" name="totalLettre" id="subject" placeholder="Total en lettre" >
			</div>
            </div>   
            <div class="col-md-12">
                        <div class="form-group">
                        <label class="label" for="#">Fichier</label>
                        <input type="file"  required class="form-control" name="file" id="subject" placeholder="Fichier" >
			</div>
            </div>    
            <div class="col-md-12">
			<div class="form-group">
            <button type="submit" class="btn btn-outline-success ">Valider</button>
            <a  href ="/listeBon" class="btn btn-outline-primary ">Retour</a>
            <br/><br/> 
            <div class="submitting"></div>
            </div>                        
            </div>
            </div>
</form>	
</div>
</div> 


</center>
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

    
<script type="text/javascript">
    var i = 0;
    
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text"  required class="form-control" name="addMoreInputFields['+ i +'][description]"  placeholder="Description"></td><td><input type="number" min="1"   required class="form-control" name="addMoreInputFields['+ i +'][qt]" id="qtE" placeholder="Quantite"></td><td><input type="number" min="1"   required class="form-control" name="addMoreInputFields['+i+'][prixUnit]" id="qtE" placeholder="Prix"></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
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
</body>
</html>
