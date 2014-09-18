<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        @if($gender == 1)
          <h2>Poštovani {{$first_name}} {{$last_name}},</h2>  
        @endif

        @if($gender == 2)
            <h2>Poštovana {{$first_name}} {{$last_name}},</h2>
        @endif

        <p>Nedavno ste započeli rešavanje testa profesionalne orijentacije. <br>
            Ovim putem Vas pozivam da završite rešavanje testa.<br>
        </p>

        <p>Molim Vas da posetite <a href="http://po.puskice.org/come-back/{{$hash}}">klikom na ovaj link </a> http://po.puskice.org/come-back/{{$hash}} nastavite rešavanje testa tamo gde ste prethodno stali.</p>

        <p>Svrha testa je akademske prirode i dobijeni podaci neće biti korišćeni u druge svrhe.<br/>
            Unapred hvala</p>
        
    </body>
</html>