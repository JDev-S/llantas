<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Ticket_{{$ticket}}</title>

    <style>
        .invoice-box {
            max-width: 900px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 12px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            /*color: #555;*/
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr .acomodar:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #2470BD;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            color: white;
            border: 1;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: 1;
        }

        .invoice-box table tr.total .acomodar:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /* RTL */
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr .acomodar:nth-child(2) {
            text-align: left;
        }

    </style>
</head>

<?php
    echo '<body>
		<div class="invoice-box table">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title" style="padding-bottom: 0px;">
									<img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" />
								</td>

								<td style="text-align:right">
									<b>Folio #:</b>'.$ticket.'<br />
									<b>Fecha:</b> '.$fecha_pedido.'<br />
									
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="4">
						<table >
							<tr>
								<td style="padding-bottom: 30px;">
									Solicitante<br />
									<b>Usuario:</b> 
									'.$nombre_solicitante.'
                                    <br />
									<b>Sucursal:</b> 
									'.$sucursal_solicitante.'
                                     <br />
								</td>

								<td style="text-align:right" >
                                Distribuidor<br />
								<b>Usuario:</b>
									'.$nombre_distribuido.'<br />
                                    <b>Sucursal:</b>
									'.$sucursal_distribuidor.'
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="heading" >
					<td style="text-align:center;">Folio del pedido</td>
					<td style="text-align:center;">Código del producto</td>
                    <td style="text-align:center;">Cantidad</td>
					<td style="text-align:center;">Descripción</td>
				</tr>';
                
                foreach($detalles_pedido_sucursal as $detalle)
                {
				echo '<tr class="item">
					<td style="text-align:center;">'.$detalle->id_pedido.'</td>
                    <td style="text-align:center;">'.$detalle->nombre.'</td>
                    <td style="text-align:center;">'.$detalle->cantidad.'</td>
                    <td style="text-align:center;">'.$detalle->descripcion.'</td>
				</tr>';
                }



			echo'</table>
            <table cellpadding="0" cellspacing="0">
            <tr  style="text-align:left;">
					<td style="text-align:left;"><b>Historial </b></td>
					
				</tr>

				<tr class="heading">
					<td style="text-align:center;">Folio del pedido</td>
					<td style="text-align:center;">Status</td>
                    <td style="text-align:center;">Fecha</td>
					<td style="text-align:center;">Descripción</td>
				</tr>';
                 foreach($historial_pedidos as $abono)
                {
                    
				echo '<tr class="item">
					<td style="text-align:center;">'.$abono->id_pedido.'</td>
                    <td style="text-align:center;">'.$abono->status.'</td>
                    <td style="text-align:center;">' .$abono->fecha_evento.'</td>
                    <td style="text-align:center;">' .$abono->descripcion_evento.'</td>
				</tr>';
                }
            echo'</table>
		</div>
	</body>';
    ?>

</html>
