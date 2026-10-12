<!doctype html>
<html lang="en">
  <head>
  <title>GStock</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" />
	  <link rel="stylesheet" href="css_formulaire/style.css">
    <link rel="stylesheet" href="css/boxicons.min.css" />

	</head>
	<body>
  @include("menu")

    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Produit entrant</span>
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
									<h3 class="mb-4"><center>Produit entrant</center></h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<form method="POST" id="contactForm" action="/stock_in" name="contactForm" class="contactForm">
                                    @csrf
                    @if(session()->has('message'))
            <div class="alert alert-primary" id="alert" role="alert">
               {{ session()->get('message') }}
            </div>
               @endif
               <div class="row">
               <div class="col-md-6">
												<div class="form-group">
													<label class="label"  for="name">Numéro Facture</label>
													<input type="text" class="form-control" required name="addMoreInputFields[0][Num_facture]" id="name" placeholder="Facture">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label"  for="name">Fournisseur</label>
													<input type="text" class="form-control" required name="addMoreInputFields[0][fournisseur]" id="name" placeholder="Fournisseur">
												</div>
											</div>
                      
                      <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Designation</th>
                    <th>Quantité</th>
                    <th>Action</th>
                </tr>
                <tr>
                  <td><select class="custom-select mr-sm-2" id="designation" name="addMoreInputFields[0][designation]"  required >
                        <option value="">Veuillez sélectionner!</option>
                                                    <?php   foreach ($stock_cur as $app):   ?>
                                                    <option value="<?= $app['designation']?>" id="designation" label="<?= $app['designation']?>"  name="designation"><?= $app['qt']?></option>
                                                    <?php endforeach; ?>
                                                    </select></td>     
                                                                               
<td><input type="number" min="01" max="10000"  required class="form-control" name="addMoreInputFields[0][qte]" id="qtE" placeholder="Quantite">
					             </td>
<td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Ajouter</button></td>
</tr>
</table>
											<div class="col-md-12">
                      <center>
						<div class="form-group">
            <button type="submit" class="btn btn-outline-success ">Valider</button>
            <a  href ="/listeIn" class="btn btn-outline-primary ">Retour</a>
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

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">

    var i = 0;
    
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><select class="custom-select mr-sm-2" id="designation'+ i +'" name="addMoreInputFields['+ i +'][designation]"  required > <option value="">Veuillez sélectionner!</option> <?php   foreach ($stock_cur as $app):   ?>
        <option value="<?= $app['designation']?>" id="designation'+ i +'" label="<?= $app['designation']?>"  name="designation"><?= $app['qt']?></option><?php endforeach; ?> </select></td><td><input type="number" name="addMoreInputFields['+i+'][qte]" min="1" max="10000" placeholder="Quantite"  required class="form-control"    /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
    
</script>
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

