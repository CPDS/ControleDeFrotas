<style type="text/css">
      .tg  {border-collapse:collapse;border-spacing:0; width: 100%;}
          .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg .tg-q19q{font-size:16px;vertical-align:top}
          .tg .tg-ox40{font-weight:bold;font-size:14px;text-align:left;vertical-align:top;}
      .tc  {border-collapse:collapse;border-spacing:0; width: 70%;margin-left: 120px}
          .tc td{font-family:Arial, sans-serif;font-size:14px;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tc th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tc .tc-q19q{font-size:16px;vertical-align:top}
          .tc .tc-qt{font-size:16px;vertical-align:top;text-align: center;}
          .tc .tc-ox40{font-weight:bold;font-size:14px;text-align:left;vertical-align:top;}
</style>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Viagens</title>
    </head>
<body>
    <div>

    <div style="text-align: center; margin-top: 50px">
      	<h3>RELATÓRIO DE VIAGENS</h3>
      </div>
		<table class="tg">
			<tr>
        <th class="tg-q19q">Nome</th>
				<th class="tg-q19q">Destino</th>
        <th class="tg-q19q">Veiculo</th>
				<th class="tg-q19q">RV</th>

			</tr>

		@foreach($viagens as $viagem)
			<tr>	
        <td class="tg-q19q">{{$viagem->nome}}</td>
				<td class="tg-q19q">{{$viagem->fk_cidade_chegada}}</td>
        <td class="tg-q19q">{{$viagem->fk_veiculo}}</td>
				<td class="tg-q19q">{{$viagem->numero_rv}}</td>
			</tr>			
		@endforeach
		</table>
</div>
</body>
</html>