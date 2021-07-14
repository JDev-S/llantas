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
					<td colspan="6">
						<table>
							<tr>
								<td class="title" style="padding-bottom: 0px;">
									<img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" />
								</td>

								<td style="text-align:right">
									<b>Folio #:</b>'.$ticket.'<br />
									<b>Fecha:</b> '.$fecha_venta.'<br />
									
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
									LLANTIMAX<br />
									<b>Sucursal:</b> 
									'.$sucursal_usuario.'
                                    <br />
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="heading" >
                    <td style="text-align:center;">Nombre proveedor</td>
                    <td style="text-align:center;">Nombre empresa</td>
					<td style="text-align:center;">Código producto</td>
					<td style="text-align:center;">Cantidad</td>
                    <td style="text-align:center;">Precio</td>
					<td style="text-align:center;">Total</td>
				</tr>';
                
                foreach($pedidos_detalles as $propiedad)
                {
                    $valor2=$propiedad->precio_unidad;
                                    if ($valor2<0) return "-".formato_moneda(-$valor2);
                    //echo '$' . number_format($valor1, 2);
                    
                    $valor=$propiedad->total;
                    if ($valor<0) return "-".formato_moneda(-$valor);
                        //echo '$' . number_format($valor1, 2);
				echo '<tr class="item">
                    <td style="text-align:center;">'.$propiedad->nombre_contacto.'</td>
                    <td style="text-align:center;">'.$propiedad->nombre_empresa.'</td>
					<td style="text-align:center;">'.$propiedad->nombre.'</td>
                    <td style="text-align:center;">'.$propiedad->cantidad.'</td>
                    <td style="text-align:center;"> $' .number_format($valor2, 2).'</td>
					<td style="text-align:center;"> $' . number_format($valor, 2).'</td>
				</tr>';
                }
                    
                    $valor1=  $total_venta;
                    if ($valor1<0) return "-".formato_moneda(-$valor1);
                    echo
                    '<tr class="total">
                        <td></td>
                        <td></td><td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:center; font-size:12px; padding-top: 0px;"> 
                            <table>
                            <tr>
                                <td width=40% style="padding-top: 0px;"><b>Total:</b></td>
                                <td style="padding-top: 0px;">' ;

                                    echo '$'.number_format($valor1, 2).
                                '</td>
                            </tr>
                            </table>
                          </td>
				    </tr>
			</table>
		</div>
	</body>';
    ?>
</html>