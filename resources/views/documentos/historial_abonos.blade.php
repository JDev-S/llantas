<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Ticket_{{$id_venta}}</title>

		<style>
			.invoice-box {
				max-width: 900px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
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
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
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
								<td class="title">
									<img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" />
								</td>

								<td>
									<b>Folio #:</b>'.$id_venta.'<br />
									<b>Fecha:</b> '.$fecha_venta.'<br />
									
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="4">
						<table>
							<tr>
								<td>
									LLANTIMAX<br />
									<b>Sucursal:</b> 
									'.$sucursal.'
								</td>

								<td style="text-align:right" >
								<b>Nombre cliente:</b>
									'.$cliente.'<br />
                                    <b>Correo eléctronico:</b>
									'.$correo.'
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr  style="text-align:left;">
					<td style="text-align:left;"><b>Método: </b>'.$metodo_pago.'</td>
					
				</tr>
                <tr  style="text-align:left;">
					<td style="text-align:left;"><b>Detalle venta</b></td>
					
				</tr>

				<tr class="heading">
					<td style="text-align:center;">Código</td>
					<td style="text-align:center;">Cantidad</td>
                    <td style="text-align:center;">Precio</td>
					<td style="text-align:center;">Total</td>
				</tr>';
                
                foreach($detalles as $detalle)
                {
                    $valor2=$detalle->precio_unidad;
                                    if ($valor2<0) return "-".formato_moneda(-$valor2);
                    //echo '$' . number_format($valor1, 2);
                    
                    $valor=$detalle->total;
                    if ($valor<0) return "-".formato_moneda(-$valor);
                        //echo '$' . number_format($valor1, 2);
				echo '<tr class="item">
					<td style="text-align:center;">'.$detalle->nombre.'</td>
                    <td style="text-align:center;">'.$detalle->cantidad_producto.'</td>
                    <td style="text-align:center;"> $' .number_format($valor2, 2).'</td>
					<td style="text-align:center;"> $' . number_format($valor, 2).'</td>
				</tr>';
                }
                
				echo'<tr class="total">
					<td></td>
                    <td></td>
                    <td></td>
					<td style="text-align:center; font-size:16px;"><b>Total: ';  
                        $valor1=  $total_venta;
                         if ($valor1<0) return "-".formato_moneda(-$valor1);
                        echo '$' . number_format($valor1, 2);
                        echo'</b></td>
				</tr>
			</table>
            <table cellpadding="0" cellspacing="0">
            <tr  style="text-align:left;">
					<td style="text-align:left;"><b>Historial abonos </b></td>
					
				</tr>

				<tr class="heading">
					<td style="text-align:center;">Folio del abono</td>
					<td style="text-align:center;">Folio de crédito</td>
                    <td style="text-align:center;">Fecha</td>
					<td style="text-align:center;">Monto</td>
                    <td style="text-align:center;">Comentario</td>
				</tr>';
                 foreach($abonos as $abono)
                {
                    
                    $valor=$abono->monto;
                    if ($valor<0) return "-".formato_moneda(-$valor);
                        //echo '$' . number_format($valor1, 2);
				echo '<tr class="item">
					<td style="text-align:center;">'.$abono->id_abono_credito.'</td>
                    <td style="text-align:center;">'.$abono->id_credito.'</td>
                    <td style="text-align:center;">' .$abono->fecha.'</td>
					<td style="text-align:center;"> $' . number_format($valor, 2).'</td>
                    <td style="text-align:center;">' .$abono->comentario.'</td>
				</tr>';
                }
            echo'</table>
		</div>
	</body>';
    ?>
</html>