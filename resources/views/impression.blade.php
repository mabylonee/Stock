<!doctype html>
<html lang="en">
   
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/bootstrap.min.css">
     <!-- Font Awesome -->
    <!-- Custom Style -->
    <link rel="stylesheet" href="style_impression.css">

    <title>GStock</title>
</head>

<body>
    <div class="my-5 page" >
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="logo-bim.jpg" alt="" class="img-fluid">                    <img src="logo-bim.jpg" alt="" class="img-fluid">
                   

                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>BIM-BANK</p>
                    </div>
                    <div class="position-relative">
                        <p>Banque Islamique<span>de Mauritanie</span></p>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Designation</td>
                            <td>Quantité</td>
                            <td>Quantité(Min)</td>
                           
                        </tr>
                    </thead>
                    <tbody>
          <?php   foreach ($stock_cur as $app):   ?>
            <tr scope="row">    
                      <td> <?= $app['designation']?></td>
                      <td> <?= $app['qt']?></td>
                      <td> <?= $app['qtMin']?></td>
            </tr>
            <?php endforeach; ?>
            </tr>
          </tbody>
                </table>
          </section>
         
            <!-- Cart BG -->
           </div>
    </div>










</body></html>