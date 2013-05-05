<h3 class="tituloEstadisticas">Local</h3>
<div class="est e1">
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo11->getGanadoscasa()/$datos_equipo11->getJugadoscasa(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $datos_equipo11->getGanadoscasa()."/".$datos_equipo11->getJugadoscasa() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo11->getEmpatadoscasa()/$datos_equipo11->getJugadoscasa(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $datos_equipo11->getEmpatadoscasa()."/".$datos_equipo11->getJugadoscasa() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo11->getPerdidoscasa()/$datos_equipo11->getJugadoscasa(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $datos_equipo11->getPerdidoscasa()."/".$datos_equipo11->getJugadoscasa() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo11->getFavorcasa()/$datos_equipo11->getJugadoscasa(); echo $aux*100;?>%;"><?php echo number_format($aux,2); ?> - (<?php echo $datos_equipo11->getFavorcasa()."/".$datos_equipo11->getJugadoscasa() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo11->getContracasa()/$datos_equipo11->getJugadoscasa(); echo $aux*100;?>%;"><?php echo number_format($aux,2); ?> - (<?php echo $datos_equipo11->getContracasa()."/".$datos_equipo11->getJugadoscasa() ?>)</strong></div></div>
</div>
<div class="estd datos">
	<div class="ditem"><span class="c1">victorias</span></div>
	<div class="ditem"><span class="c2">empates</span></div>
	<div class="ditem"><span class="c2">derrotas</span></div>
	<div class="ditem"><span class="c2">promedio de goles a favor</span></div>
	<div class="ditem"><span class="c2">promedio de goles en contra</span></div>
	<!--<div class="ditem"><span class="c2">resultado más repetido</span></div>
	<div class="ditem"><span class="c2">resultado con más goles</span></div>-->
</div>
<div class="est e2">
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo22->getGanadoscasa()/$datos_equipo22->getJugadoscasa(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $datos_equipo22->getGanadoscasa()."/".$datos_equipo22->getJugadoscasa() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo22->getEmpatadoscasa()/$datos_equipo22->getJugadoscasa(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $datos_equipo22->getEmpatadoscasa()."/".$datos_equipo22->getJugadoscasa() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo22->getPerdidoscasa()/$datos_equipo22->getJugadoscasa(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $datos_equipo22->getPerdidoscasa()."/".$datos_equipo22->getJugadoscasa() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo22->getFavorcasa()/$datos_equipo22->getJugadoscasa(); echo $aux*100;?>%;"><?php echo number_format($aux,2); ?> - (<?php echo $datos_equipo22->getFavorcasa()."/".$datos_equipo22->getJugadoscasa() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo22->getContracasa()/$datos_equipo22->getJugadoscasa(); echo $aux*100;?>%;"><?php echo number_format($aux,2); ?> - (<?php echo $datos_equipo22->getContracasa()."/".$datos_equipo22->getJugadoscasa() ?>)</strong></div></div>
	<!--<div class="item"><div class="nograph"><strong class="bar" style="width: 33.333333333333%;"> 2-0 (2 veces)</strong></div></div>
	<div class="item"><div class="nograph"><strong class="bar" style="width: 40%;"><a style="font-weight:normal;" href="http://www.resultados-futbol.com/Rayo-Vallecano">Rayo Vallecano</a> <a rel="nofollow" href="http://www.resultados-futbol.com/partido/Rayo-Vallecano/Hercules">4-4</a> <a style="font-weight:normal;" href="http://www.resultados-futbol.com/Hercules">Hércules</a></strong></div></div>-->
</div>
<h3 class="tituloEstadisticas">Visitante</h3>
<div class="est e1">
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo11->getGanadosfuera()/$datos_equipo11->getJugadosfuera(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $datos_equipo11->getGanadosfuera()."/".$datos_equipo11->getJugadosfuera() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo11->getEmpatadosfuera()/$datos_equipo11->getJugadosfuera(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $datos_equipo11->getEmpatadosfuera()."/".$datos_equipo11->getJugadosfuera() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo11->getPerdidosfuera()/$datos_equipo11->getJugadosfuera(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $datos_equipo11->getPerdidosfuera()."/".$datos_equipo11->getJugadosfuera() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo11->getFavorfuera()/$datos_equipo11->getJugadosfuera(); echo $aux*100;?>%;"><?php echo number_format($aux,2); ?> - (<?php echo $datos_equipo11->getFavorfuera()."/".$datos_equipo11->getJugadosfuera() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo11->getContrafuera()/$datos_equipo11->getJugadosfuera(); echo $aux*100;?>%;"><?php echo number_format($aux,2); ?> - (<?php echo $datos_equipo11->getContrafuera()."/".$datos_equipo11->getJugadosfuera() ?>)</strong></div></div>
</div>
<div class="estd datos">
	<div class="ditem"><span class="c1">victorias</span></div>
	<div class="ditem"><span class="c2">empates</span></div>
	<div class="ditem"><span class="c2">derrotas</span></div>
	<div class="ditem"><span class="c2">promedio de goles a favor</span></div>
	<div class="ditem"><span class="c2">promedio de goles en contra</span></div>
	<!--<div class="ditem"><span class="c2">resultado más repetido</span></div>
	<div class="ditem"><span class="c2">resultado con más goles</span></div>-->
</div>
<div class="est e2">
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo22->getGanadosfuera()/$datos_equipo22->getJugadosfuera(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $datos_equipo22->getGanadosfuera()."/".$datos_equipo22->getJugadosfuera() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo22->getEmpatadosfuera()/$datos_equipo22->getJugadosfuera(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $datos_equipo22->getEmpatadosfuera()."/".$datos_equipo22->getJugadosfuera() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo22->getPerdidosfuera()/$datos_equipo22->getJugadosfuera(); echo $aux*100;?>%;"><?php echo number_format($aux*100,0); ?>% (<?php echo $datos_equipo22->getPerdidosfuera()."/".$datos_equipo22->getJugadosfuera() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo22->getFavorfuera()/$datos_equipo22->getJugadosfuera(); echo $aux*100;?>%;"><?php echo number_format($aux,2); ?> - (<?php echo $datos_equipo22->getFavorfuera()."/".$datos_equipo22->getJugadosfuera() ?>)</strong></div></div>
	<div class="item"><div class="graph"><strong class="bar" style="width: <?php $aux = $datos_equipo22->getContrafuera()/$datos_equipo22->getJugadosfuera(); echo $aux*100;?>%;"><?php echo number_format($aux,2); ?> - (<?php echo $datos_equipo22->getContrafuera()."/".$datos_equipo22->getJugadosfuera() ?>)</strong></div></div>
	<!--<div class="item"><div class="nograph"><strong class="bar" style="width: 33.333333333333%;"> 2-0 (2 veces)</strong></div></div>
	<div class="item"><div class="nograph"><strong class="bar" style="width: 40%;"><a style="font-weight:normal;" href="http://www.resultados-futbol.com/Rayo-Vallecano">Rayo Vallecano</a> <a rel="nofollow" href="http://www.resultados-futbol.com/partido/Rayo-Vallecano/Hercules">4-4</a> <a style="font-weight:normal;" href="http://www.resultados-futbol.com/Hercules">Hércules</a></strong></div></div>-->
</div>