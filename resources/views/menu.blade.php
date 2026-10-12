<div class="sidebar">
      <div class="logo-details">
        <span class="logo_name"><img src="/logo-bim.jpg"></span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="/index" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Tableau de bord</span>
          </a>
        </li>
        <li>
          <a href="/listeCur">
            <i class="bx bx-box"></i>
            <span class="links_name">Stock initial</span>
          </a>
        </li>
        <li>
          <a href="/listeIn">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Produit entrant</span>
          </a>
        </li>
        <li>
          <a href="/listeOut">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Produit sortant </span>
          </a>
        </li>
        <li>
          <a href="/listeBon">
          <i class="bx bx-box"></i>
            <span class="links_name">Bon de commande </span>
          </a>
        </li>
        <?php   foreach ($data as $app):  
        
          if($app['dep']=="IT" ){
              echo '<li> <a href="/listeUser">
              <i class="bx bx-box"></i>
                <span class="links_name">Utilisateur </span>
              </a> </li>';
          }
           endforeach; ?>
         
        
        <li>
          <a href="/profil">
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
  