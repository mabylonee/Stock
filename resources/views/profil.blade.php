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
          <span class="dashboard">Paramétres</span>
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
		
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ asset ('/update/'.$users->where('id','=', session('LoggedUser'))->pluck('id')->last()) }}"   autocomplete="off" class="form-horizontal">
            @csrf
            @if(session()->has('message'))
            <div class="alert alert-primary" role="alert">
               {{ session()->get('message') }}
            </div>
               @endif
               @if(session()->has('erreur'))
            <div class="alert alert-danger" role="alert">
               {{ session()->get('erreur') }}
            </div>
               @endif
            <div class="card">
              <div class="card-header card-header-warning" >
                <h4 class="card-title">{{ __('Editer Profil') }}</h4>
                <p class="card-category">{{ __('Informations Utilisateur') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <?php   foreach ($data as $app):   ?>
                      <input class="form-control" name="name" value=    <?= $app['name'] ?> id="input-name" type="text" placeholder="{{ __('Nom') }}"  value required="true" aria-required="true"/>
                   
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control" value=    <?= $app['email'] ?> name="email"placeholder="{{ __('Email') }}"  value  id="input-email" type="email"  required />
                      <?php endforeach; ?>
 @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn"  style="background-color:rgb(221, 149, 14) ;">{{ __('Valider') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form method="post"  action="{{ asset ('/updatepassword/'.$users->where('id','=', session('LoggedUser'))->pluck('id')->last()) }}" class="form-horizontal">
            @csrf
    
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Changer Mot de passe') }}</h4>
                <p class="card-category">{{ __('Mot de passe') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status_password'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status_password') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Mot de passe Actuel') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                      <input type="Password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"  name="old_password" id="input-current-password" placeholder="{{ __('Mot de passe actuel') }}" value="" required />
                      
                      @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('Nouveau Mot de passe') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('Nouveau Mot de passe') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                  </div>
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn"  style="background-color:rgb(221, 149, 14) ;">{{ __('Valider') }}</button>
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

