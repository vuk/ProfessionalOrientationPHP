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
        <h2>Rezultati vašeg testiranja su: </h2>

        <table>
            <tr>
                <td><strong>Poljoprivreda: </strong></td><td>{{$poljoprivreda}}</td>
            </tr>
            <tr>
                <td><strong>Šumarstvo: </strong></td><td>{{$sumarstvo}}</td>
            </tr>
            <tr>
                <td><strong>Geodezija: </strong></td><td>{{$geodezija}}</td>
            </tr>
            <tr>
                <td><strong>Mašinstvo: </strong></td><td>{{$masinstvo}}</td>
            </tr>
            <tr>
                <td><strong>Elektrotehnika: </strong></td><td>{{$elektrotehnika}}</td>
            </tr>
            <tr>
                <td><strong>Hemija: </strong></td><td>{{$hemija}}</td>
            </tr>
            <tr>
                <td><strong>Tekstil: </strong></td><td>{{$tekstil}}</td>
            </tr>
            <tr>
                <td><strong>Saobraćaj: </strong></td><td>{{$saobracaj}}</td>
            </tr>
            <tr>
                <td><strong>Trgovina i ugostiteljstvo: </strong></td><td>{{$trgovinaugostiteljstvo}}</td>
            </tr>
            <tr>
                <td><strong>Ekonomija i pravo: </strong></td><td>{{$ekonomijapravo}}</td>
            </tr>
            <tr>
                <td><strong>Hidrometeorologija: </strong></td><td>{{$hidrometeorologija}}</td>
            </tr>
            <tr>
                <td><strong>Kultura: </strong></td><td>{{$kultura}}</td>
            </tr>
            <tr>
                <td><strong>Zdravstvo: </strong></td><td>{{$zdravstvo}}</td>
            </tr>
            <tr>
                <td><strong>Usluge: </strong></td><td>{{$usluge}}</td>
            </tr>

        </table>
        
    </body>
</html>