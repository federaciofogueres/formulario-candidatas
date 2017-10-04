<?php
function getCandidata($uid){
  /*Aquí con redbean habrá que vincular la tabla de comisiones y devolver también el nombre de la comisión*/
	$candidata  = R::findOne( CANDIDATAS, ' uid = ? ', [$uid]);
	return $candidata;
}
