<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/bootstrap.min.css">
    <link rel="stylesheet" href="/impression.css">

    <title>GStock</title>
</head>

<body>
    <div class="my-5 page" size="A4" orientation="landscape">
        <div class="p-4">
            <section class="top-content bb d-flex justify-content-between">
             <div class="logo">
            <center> <img src="/logo-bim.jpg" alt="" class="img-fluid" width="100%"> <center>
            </div>
            </section>
           <center><b> BORDEREAU DE DEMANDE FOURNITURE</b></center>
            <section class="product-area mt-4">
            <table class="table table-hover" border="2px">
                    <thead>
                        <tr>
                        <th>Date</th>
                        <th>Departement</th>
                        <th>Nom</th>
                        <th>Quantité</th>
                        <th>Designation</th>
                            
                           
                           
             </tr>
            </thead>
            <tbody>
            <tr scope="row" >
             <td  rowspan = <?= sizeof($stock_out) ?>> <?= $stock_out[0]['date_out']?></td>
             <td rowspan=  <?= sizeof($stock_out) ?>>  <?= $stock_out[0]['dep']?></td>
             <td rowspan=  <?= sizeof($stock_out) ?>>  <?= $stock_out[0]['mat_user']?></td>
             <td >  <?= $stock_out[0]['qt']?></td>
             <td >  <?= $stock_out[0]['designation']?></td>
          </tr>
            <?php   foreach ($stock_out as $key =>  $app ):   ?>
              <?php  if($key> 0) { ?>
             <tr scope="row" > 
             <td> <?=  $app['qt']?></td>
            <td> <?= $app['designation']?></td>           
          </tr>
          <?php } endforeach; ?>
        
          <tr scope="row"> 
           
          </tbody>
          </table>
          <br><br><br>
        AGENCE &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; MOYEN GENEREAUX
          </section>
        
            <!-- Cart BG -->
             </div>
 </div>










</body></html>