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
      </nav>
      
	<section class="ftco-section">
    <center>
		
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4"><center>Produit sortant</center></h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<form   method="POST" id="contactForm" action="/stock_out" name="contactForm" class="contactForm" >
                  @csrf
        
               @if(session()->has('error'))
            <div class="alert alert-danger" id="alert" role="alert">
               {{ session()->get('error') }}
            </div>
               @endif
               
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label"  for="name">Agence</label>
                                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"   name="addMoreInputFields[0][agence]" required>
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
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name=" addMoreInputFields[0][dep]"  required  >
                        <option value="">Veuillez sélectionner!</option>
                                                    <?php   foreach ($departement as $app):   ?>
                                                    <option value="<?= $app['dep_desc']?>" name="dep"><?= $app['dep_desc']?></option>
                                                    <?php endforeach; ?>
                                                    </select>		 </div>
                                                    </div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Demandeur</label>
													<input type="text"  required class="form-control" name="addMoreInputFields[0][mat_user]" id="subject" placeholder="Nom" >
												</div>
											</div>
                       <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Designation</th>
                    <th>Quantité(éxistant)</th>
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
<td><input type="text"  required class="form-control" name="addMoreInputFields[0][qtE]" id="qtE" placeholder="Quantite(existant)"  readonly="true"></td>
<td><input type="number"   min="01" max="10000" name="addMoreInputFields[0][qt]" placeholder="Quantité" class="form-control" required /></td>
<td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Ajouter</button></td>
</tr>
</table>
            <div class="col-md-12">
						<div class="form-group">
            <button type="submit" class="btn btn-outline-success ">Valider</button>
            <a  href ="/listeOut" class="btn btn-outline-primary ">Retour</a>

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

<script type="text/javascript">

$("#designation").change(function(){
   var displayFullname= $("#designation option:selected").text();
   $("#qtE").val(displayFullname);
});

    var i = 0;
    
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><select class="custom-select mr-sm-2" id="designation'+ i +'" name="addMoreInputFields['+ i +'][designation]"  required > <option value="">Veuillez sélectionner!</option> <?php   foreach ($stock_cur as $app):   ?>
        <option value="<?= $app['designation']?>" id="designation'+ i +'" label="<?= $app['designation']?>"  name="designation"><?= $app['qt']?></option><?php endforeach; ?> </select></td><td><input type="number" name="addMoreInputFields[0][qtE'+ i +']" placeholder="quantite existant" id="qtE'+ i +'" required class="form-control"  readonly="true"  /></td><td><input type="number" name="addMoreInputFields[' + i +
            '][qt]" placeholder="quantite sortant" id="qt"   min="1" max="10000" required class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
          
            $("#designation1").change(function(){
   var displayFullname1= $("#designation1 option:selected").text();
   $("#qtE1").val(displayFullname1);
});
$("#designation2").change(function(){
   var displayFullname1= $("#designation2 option:selected").text();
   $("#qtE2").val(displayFullname1);
});
$("#designation3").change(function(){
   var displayFullname1= $("#designation3 option:selected").text();
   $("#qtE3").val(displayFullname1);
});
$("#designation4").change(function(){
   var displayFullname1= $("#designation4 option:selected").text();
   $("#qtE4").val(displayFullname1);
});
$("#designation5").change(function(){
   var displayFullname1= $("#designation5 option:selected").text();
   $("#qtE5").val(displayFullname1);
});
$("#designation6").change(function(){
   var displayFullname1= $("#designation6 option:selected").text();
   $("#qtE6").val(displayFullname1);
});
$("#designation7").change(function(){
   var displayFullname1= $("#designation7 option:selected").text();
   $("#qtE7").val(displayFullname1);
});
$("#designation8").change(function(){
   var displayFullname1= $("#designation8 option:selected").text();
   $("#qtE8").val(displayFullname1);
});
$("#designation9").change(function(){
   var displayFullname1= $("#designation9 option:selected").text();
   $("#qtE9").val(displayFullname1);
});


     
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
   
</script>
<script >
		setTimeout(function () {

			// Closing the alert
			$('#alert').alert('close');
		}, 5000);
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
