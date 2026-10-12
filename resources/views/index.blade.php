<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>GStock</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Boxicons CDN Link -->
    <link rel="stylesheet" href="css/boxicons.min.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
  @include("menu")

    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Tableau de bord</span>
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

      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Stock initial</div>
              <div class="number"><?php

$mysqli=mysqli_connect("localhost","root",'',"bim");
                        if ($result = $mysqli->query("SELECT id FROM stock_curs ORDER BY id")) {

                            /* Détermine le nombre de lignes dans le jeu de résultats */
                            $row_cnt = $result->num_rows;

                            printf ($row_cnt);

                            /* Clôt le jeu de résultats */
                            $result->close();
                        }

?></div>
              <div class="indicator">
                <span class="text"></span>
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Entrant</div>
              <div class="number"><?php

$mysqli=mysqli_connect("localhost","root",'',"bim");
                        if ($result = $mysqli->query("SELECT idIn FROM stock_ins ORDER BY idIn")) {

                            /* Détermine le nombre de lignes dans le jeu de résultats */
                            $row_cnt = $result->num_rows;

                            printf ($row_cnt);

                            /* Clôt le jeu de résultats */
                            $result->close();
                        }

?></div>
              <div class="indicator">
                
              </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>
        
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Sortant</div>
              <div class="number"><?php

$mysqli=mysqli_connect("localhost","root",'',"bim");
                        if ($result = $mysqli->query("SELECT idOut FROM stock_outs ORDER BY idOut")) {

                            /* Détermine le nombre de lignes dans le jeu de résultats */
                            $row_cnt = $result->num_rows;

                            printf ($row_cnt);

                            /* Clôt le jeu de résultats */
                            $result->close();
                        }

?></div>
              <div class="indicator">
               
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>

        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title"> <center>Derniers Ajouts</center></div>
            <div class="sales-details">
            <table class="table table-striped custom-table">
          <thead>
            <tr>
              <th scope="col">Designation</th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col">Date</th>
              
              
            </tr>
          </thead>
          <tbody>
          <?php   foreach ($stock_cur as $app):   ?>
            <tr scope="row">    
                      <td> <?= $app['designation'] ?>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </td>
                      <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </td>
                      <td> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  </td>
                      <td>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  </td>
                      <td>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  </td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </td>
                      <td>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  </td>
                      <td> <?= $app['created_at']?></td>    
            </tr>
              <?php endforeach; ?>
            </tr>
          </tbody>
        </table>
        </div>
          </div>
          <div class="top-sales box">
            <div class="title"><center>Entrer recents</center> </div>
            <table class="table table-striped custom-table">
          <thead>
            <tr>
            </tr>
          </thead>
          <tbody>
          <?php   foreach ($stock_in as $app):   ?>
            <tr scope="row">    
                      <td> <?= $app['designation'] ?>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </td>
                
            </tr>
              <?php endforeach; ?>
            </tr>
          </tbody>
        </table>
        </div>
                      
        </div>
      </div>
    </section>

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
