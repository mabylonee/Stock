<html>
    <head>
        <title>GSTOCK</title>
        <link rel="stylesheet" href="/assets/css/invoice.css" />
        <link rel="stylesheet" type="text/css" href="/bootstrap.min.css"  >
    </head>
    <body>
       
    <div class="container">
        <div class="invoice">
            <div class="row">
                <div class="col-7">
                    <img src="/logo-bim.jpg" class="logo"/>
                </div>
                <div class="col-5">
                <img src="/logo-bim.jpg" class="logo"/>
                </div>
            </div>
            <div class="row">
                <div class="col-7">
                    <p class="addressMySam">
                        <h1>BON DE COMMANDE N°
                        @foreach ($data2 as $row)
            {{$row->code}}
              @endforeach </h1><br/>
                    </p>
                </div>
                <div class="col-5">
                    <br/><br/><br/>
                    <div class="row">
                <div class="col-8">
                </div>
                <div class="col-12">
                    <table class="table_tete" border="2px">
                        <tr>
                            <td><strong>Date: </strong></td>
                            <td> @foreach ($data2 as $row)
            {{$row->updated_at	}}
              @endforeach</td>
                        </tr>
                        <tr>
                            <td><strong>Autorisépar: </strong></td>
                            <td> @foreach ($data2 as $row)
            {{$row->autorisation}}
              @endforeach</td>                        </tr>
                        <tr>
                            <td><strong>Modalités de livraison: </strong></td>
                            <td> @foreach ($data2 as $row)
            {{$row->modalite}}
              @endforeach</td>                         </tr>
              <tr>
                            <td><strong>Destinataire: </strong></td>
                            <td> @foreach ($data2 as $row)
            {{$row->destinataire}}
              @endforeach</td>                         </tr>
        
                    </table>
                </div>
            </div>
                </div>
            </div>
         
            <h6>Destinataire: <span th:text="${start}">@foreach ($data2 as $row)
            {{$row->destinataire}}
              @endforeach</span>
            </h6>
            <br/>
            <table class="table table-hover" border="2px">
                <thead>
                <tr>
                    <th>Description</th>
                    <!--<th>Quantité</th>-->
                    <!--<th>Unité</th>-->
                    <!--<th>PU TTC</th>-->
                    <th>Quantite</th>
                    <th class="text-right">Prix Unit</th>
                    <th class="text-right">Prix Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $row)
                  <tr>
                      <td>{{$row->description}}</td>
                      <td>{{$row->qt}}</td>
                      <td>{{$row->prixUnit}}</td>
                      <td>{{$row->prixTotal}}</td>

                  </tr>
              @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-8">
                </div>
                <div class="col-4">
                    <table class="table table-sm text-right">
                        <tr>
                            <td class="td_footer"><strong>Sous-total</strong></td>
                            <td class="td_footer"> @foreach ($data2 as $row)
            {{$row->sousTotal}}
              @endforeach N-UM</td>                        </tr>
                        <tr>
                            <td class="td_footer"><strong>TVA</strong></td>
                            <td class="td_footer"> @foreach ($data2 as $row)
            {{$row->tva}}
              @endforeach</td>                        </tr>
                        <tr>
                            <td class="td_footer"><strong>Total Géneral</strong></td>
                            <td class="td_footer"> @foreach ($data2 as $row)
            {{$row->totalGeneral}}
              @endforeach N-UM</td>                        </tr>
                    </table>
                    <tr>
                            <td><strong> @foreach ($data2 as $row)
            {{$row->totalLettre}}
              @endforeach</strong></td>                         </tr>
                </div>
            </div>

            <p class="conditions">
             
            </p>

            <br/>
            <br/>
            <br/>
            <br/>

            <p class="bottom-page text-right">
          
                <!--IBAN FR76 1470 7034 0031 4211 7882 825 - SWIFT CCBPFRPPMTZ-->
            </p>
        </div>
    </div>
    </body>
</html>