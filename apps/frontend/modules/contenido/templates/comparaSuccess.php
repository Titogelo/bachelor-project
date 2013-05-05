<?php echo image_tag('iconPrint.gif', 'size=12x12,alt_title=Imprimir id=imprimircomparacion') ?>
<div id="equipos">
	<?php foreach ($dato_equipo1 as $equipo1): ?>
	<div id="equipo1">
		<div class="divpos">
			<strong>Posicion en la tabla</strong>
			<span class="pos"><?php echo $equipo1->getPosicion() ?></span>
			<span class="mejorpos">Mejor: <?php echo $equipo1->getPosicion() ?>&#186;</span>
			<span class="peorpos">Peor: <?php echo $equipo1->getPosicion() ?>&#186;</span>
			<span class="posliga"><?php echo $equipo1->getCategoria()->getNombre() ?></span>
			<span class="title"><?php echo $equipo1->getEquipo()->getNombre() ?></span>
			<span class="puntos">Puntos: <?php echo $equipo1->getPuntos() ?></span>
		</div>
	</div>
	<?php endforeach; ?>
	<div id="sep"></div>
	<?php foreach ($dato_equipo2 as $equipo2): ?>
	<div id="equipo2">
		<div class="divpos">
			<strong>Posicion en la tabla</strong>
			<span class="pos"><?php echo $equipo2->getPosicion() ?></span>
			<span class="mejorpos">Mejor: <?php echo $equipo2->getPosicion() ?>&#186;</span>
			<span class="peorpos">Peor: <?php echo $equipo2->getPosicion() ?>&#186;</span>
			<span class="posliga"><?php echo $equipo2->getCategoria()->getNombre() ?></span>
			<span class="title"><?php echo $equipo2->getEquipo()->getNombre() ?></span>
			<span class="puntos">Puntos: <?php echo $equipo2->getPuntos() ?></span>
		</div>
	</div>
	<?php endforeach; ?>
</div>

<div class="cleaner"></div>

<div id="estadisticas">
	<h3 class="tituloEstadisticas">Total</h3>
	<?php foreach ($dato_equipo1 as $equipo1): ?>
	<div class="est e1">
		<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $equipo1->getGanados()/$equipo1->getJugados(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $equipo1->getGanados()."/".$equipo1->getJugados() ?>)</strong></div></div>
		<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $equipo1->getEmpatados()/$equipo1->getJugados(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $equipo1->getEmpatados()."/".$equipo1->getJugados() ?>)</strong></div></div>
		<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $equipo1->getPerdidos()/$equipo1->getJugados(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $equipo1->getPerdidos()."/".$equipo1->getJugados() ?>)</strong></div></div>
		<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $equipo1->getFavor()/$equipo1->getJugados(); echo $aux*100;?>%;"><?php echo number_format($aux,2); ?> - (<?php echo $equipo1->getFavor()."/".$equipo1->getJugados() ?>)</strong></div></div>
		<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $equipo1->getContra()/$equipo1->getJugados(); echo $aux*100;?>%;"><?php echo number_format($aux,2); ?> - (<?php echo $equipo1->getContra()."/".$equipo1->getJugados() ?>)</strong></div></div>
	</div>
	<?php endforeach; ?>
	<div class="estd datos">
		<div class="ditem"><span class="c1">victorias</span></div>
		<div class="ditem"><span class="c2">empates</span></div>
		<div class="ditem"><span class="c2">derrotas</span></div>
		<div class="ditem"><span class="c2">promedio de goles a favor</span></div>
		<div class="ditem"><span class="c2">promedio de goles en contra</span></div>
	</div>
	<?php foreach ($dato_equipo2 as $equipo2): ?>
	<div class="est e2">
		<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $equipo2->getGanados()/$equipo2->getJugados(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $equipo2->getGanados()."/".$equipo2->getJugados() ?>)</strong></div></div>
		<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $equipo2->getEmpatados()/$equipo2->getJugados(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $equipo2->getEmpatados()."/".$equipo2->getJugados() ?>)</strong></div></div>
		<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $equipo2->getPerdidos()/$equipo2->getJugados(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $equipo2->getPerdidos()."/".$equipo2->getJugados() ?>)</strong></div></div>
		<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $equipo2->getFavor()/$equipo2->getJugados(); echo $aux*100;?>%;"><?php echo number_format($aux,2); ?> - (<?php echo $equipo2->getFavor()."/".$equipo2->getJugados() ?>)</strong></div></div>
		<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $equipo2->getContra()/$equipo2->getJugados(); echo $aux*100;?>%;"><?php echo number_format($aux,2); ?> - (<?php echo $equipo2->getContra()."/".$equipo2->getJugados() ?>)</strong></div></div>
	</div>
	<?php endforeach; ?>
</div>

<?php

$contador_equipo1=0;
$evolucionEquipo1 = $evolucionEquipo2 = $html ="";

$eje_x = "0:|";
foreach ($evolucion_equipo1 as $evolucion) {
	$contador_equipo1++;
	$eje_x .= $contador_equipo1."|";
	$evolucionEquipo1 .= ",".$evolucion->getPosicion();
	$nombreEquipo1 = $evolucion->getEquipo()->getNombre();
	$posicionEquipo1 = $evolucion->getPosicion();
}
$contador_equipo2=0;

foreach ($evolucion_equipo2 as $evolucion) {
	$contador_equipo2++;
	$evolucionEquipo2 .= ",".$evolucion->getPosicion();
	$nombreEquipo2 = $evolucion->getEquipo()->getNombre();
	$posicionEquipo2 = $evolucion->getPosicion();
	
}

$evolucionEquipo1 = substr($evolucionEquipo1,1);
$evolucionEquipo2 = substr($evolucionEquipo2,1);

/*
$eje_x = "0:|";
for ($i=1; $i <= count($evolucionEquipo1); $i++) { 
	$eje_x .= $i."|";
}
*/
$eje_y = "2:||";

for ($i=18; $i > 0 ; $i--) { 
	$eje_y .= $i."|";
}

$eje_r = "4:|";

for ($i=18; $i > 0 ; $i--) { 
	$eje_r .= "|".$i;
}

$eje_x1 = "1:|Jornadas|";
$eje_y1 = "3:|Posiciones|";

if ( count($evolucionEquipo1) == 0 || count($evolucionEquipo1) == 1  )
{
	$grid_vertical = 0;
}
else
{
	$grid_vertical = 100 / ( count($evolucionEquipo1) - 1);
}
/*
$evolucionEquipo1 = implode(",",$evolucionEquipo1);
$evolucionEquipo2 = implode(",",$evolucionEquipo2);
*/
$grid_horizontal = round(100 /  18,2);

$nombreEquipo1 = str_replace(' ', '_', trim($nombreEquipo1) );
$nombreEquipo2 = str_replace(' ', '_', trim($nombreEquipo2) );

$pos_nombre = $posicionEquipo2."%C2%BA%20".trim($nombreEquipo2)."|".$posicionEquipo1."%C2%BA%20".trim($nombreEquipo1);
$chm = "o,2b4561,0,-1,5|o,50632b,1,-1,5";
$chds = "19,1"; // Esto hacia que no cuadraran los valores con las lineas
$size = "600x277";
$color = "75b6ff,bbe46a";
$titulo = "";
$posicion_rotulos = "1,50|3,50";

$html .= '
<div id="grafica_evolucion">
	<h2><span class="color_equipo1">'.$nombreEquipo1.'</span> vs <span class="color_equipo2">'.$nombreEquipo2.'</span></h2>
	<img src=http://chart.apis.google.com/chart?cht=lc&chs='.$size.'&chd=t:'.$evolucionEquipo2.'|'.$evolucionEquipo1.'&chds='.$chds.'&chdlp=b&chco='.$color.'&chtt='.$titulo.'&chdl='.$pos_nombre.'&chm='.$chm.'&chxt=x,x,y,y,r&chxl='.$eje_x.''.$eje_x1.''.$eje_y.''.$eje_y1.''.$eje_r.'&chxp='.$posicion_rotulos.'&chg='.$grid_vertical.','.$grid_horizontal.',1,0 >
</div>';

echo $html;


?>