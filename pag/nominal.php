<?php
	
			
			include('../clases/DataBase.php');
			require('../fpdf/fpdf.php');
			$xTit = 30;
			$pdf = new FPDF('P','mm','A4');
			$pdf->SetTitle("Estadisticas de la empresa");
			$pdf->addPage();
			$pdf->setFont('Arial','B',20);
			$pdf->cell(190,10,'Estadisticas Aerolineas Rustics',0,0,'C');
			$pdf->ln();
			$pdf->ln();
			$pdf->ln();
			$pdf->ln();
			$pdf->setFont('Arial','B',14);
			$pdf->setX($xTit-18);
			$pdf->cell(80,10,'Pasajes vendidos:',0,0,'C');
			$pdf->ln();
			$pdf->ln();
		
			$pdf->setX($xTit+55);
			$pdf->setFillColor(0,20,255);
			$pdf->setTextColor(255,255,255);
			$pdf->cell(40,10,'Cantidad',1,0,'C',true);

			$BDD = new DataBase();
			$consulta = $BDD->consulta("select count(*) as Pasajes_vendidos from reserva where estado_pasaje = 'Pago'");
			$regs = $BDD->resultToArray($consulta);
			$pdf->ln();
			$pdf->setX($xTit+55);
			$pdf->setTextColor(0,0,0);
		
			foreach ($regs as $reg){
				$pdf->cell(40,10,$reg['Pasajes_vendidos'],1,0,'C');
			}	
		
			$pdf->ln();
			$pdf->ln();
			$pdf->setX($xTit);
			$pdf->cell(100,8,"Cantidad de pasajes venididos por categoria y destino:",0,0,'L');
			$consulta = $BDD->consulta("select reserva.clase,vuelo.lugar_llegada,count(*) as Pasajes_vendidos from reserva join vuelo on reserva.nro_vuelo = vuelo.nro_vuelo where reserva.estado_pasaje = 'Pago' group by reserva.clase,vuelo.lugar_llegada");
			$regs = $BDD->resultToArray($consulta);
		
			$pdf->ln();
			$pdf->ln();
			$pdf->setX($xTit);
		
			$pdf->setFillColor(0,20,255);
			$pdf->setTextColor(255,255,255);
		
			$pdf->cell(50,10,"Clase",1,0,'C',true);
			$pdf->cell(50,10,"Destino",1,0,'C',true);
			$pdf->cell(50,10,"Pasajes vendidos",1,0,'C',true);
		
			$pdf->ln();
		
			$pdf->setTextColor(0,0,0);
			$cont = 1;
		
			foreach ($regs as $reg) {
				if($cont % 2 == 0){
					$pdf->setFillColor(200,200,200);
					$pdf->setX($xTit);
					$pdf->cell(50,10,$reg['clase'],1,0,'C',true);
					$pdf->cell(50,10,$reg['lugar_llegada'],1,0,'C',true);
					$pdf->cell(50,10,$reg['Pasajes_vendidos'],1,0,'C',true);
				}else{
				
					$pdf->setX($xTit);
					$pdf->cell(50,10,$reg['clase'],1,0,'C');
					$pdf->cell(50,10,$reg['lugar_llegada'],1,0,'C');
					$pdf->cell(50,10,$reg['Pasajes_vendidos'],1,0,'C');
			
				}
				$cont++;
				$pdf->ln();
			}
		
			$pdf->ln();
			$pdf->ln();
			$pdf->setX($xTit);
			$pdf->cell(90,8,"Ocupacion por avion y destino:",0,0,'L');
			$consulta = $BDD->consulta("select vuelo.matricula_avion,vuelo.lugar_llegada,count(*) as Ocupacion from reserva join vuelo on reserva.nro_vuelo = vuelo.nro_vuelo where reserva.asiento != '' and reserva.fila != '' group by vuelo.matricula_avion,vuelo.lugar_llegada");
			$regs = $BDD->resultToArray($consulta);
		
			$pdf->ln();
			$pdf->ln();
			$pdf->setX($xTit);
		
			$pdf->setFillColor(0,20,255);
			$pdf->setTextColor(255,255,255);
		
			$pdf->cell(50,10,"Avion",1,0,'C',true);
			$pdf->cell(50,10,"Destino",1,0,'C',true);
			$pdf->cell(50,10,"Ocupacion",1,0,'C',true);
			$pdf->ln();
		
			$pdf->setTextColor(0,0,0);
			$cont = 1; 
			
			foreach ($regs as $reg) {
				if($cont % 2 == 0){
			
				$pdf->setFillColor(200,200,200);
				$pdf->setX($xTit);	
				$pdf->setX($xTit);
				$pdf->cell(50,10,$reg['matricula_avion'],1,0,'C',true);
				$pdf->cell(50,10,$reg['lugar_llegada'],1,0,'C',true);
				$pdf->cell(50,10,$reg['Ocupacion'],1,0,'C',true);
				}else{
			
					$pdf->setX($xTit);
				$pdf->cell(50,10,$reg['matricula_avion'],1,0,'C');
				$pdf->cell(50,10,$reg['lugar_llegada'],1,0,'C');
				$pdf->cell(50,10,$reg['Ocupacion'],1,0,'C');
			
				}
				$cont++;
				$pdf->ln();
		}

			$pdf->ln();
			$pdf->ln();
			$pdf->setX($xTit);
			$pdf->cell(100,10,"Cantidad de reservas caidas:");
			$pdf->ln();
			$pdf->ln();
			$consulta = $BDD->consulta("select count(*) as Reservas_caidas from reserva where estado_pasaje = 'reserva'");
			$regs = $BDD->resultToArray($consulta);
			$pdf->setX($xTit+55);
		
			$pdf->setFillColor(0,20,255);
			$pdf->setTextColor(255,255,255);
		
			$pdf->cell(40,10,'Cantidad',1,0,'C',true);
			$pdf->ln();
			$pdf->setX($xTit+55);
		
			$pdf->setTextColor(0,0,0);
			
			foreach ($regs as $reg) {
				$pdf->cell(40,10,$reg['Reservas_caidas'],1,0,'C');
			}
			
			$pdf->outPut();
		
	$BDD->cerrar();

	
?>