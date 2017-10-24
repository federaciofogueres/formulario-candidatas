<?php
function getCandidata($uid){
	$candidata  = R::findOne( ADULTAS, ' uid = ? ', [$uid]);
  $comision = R::xload(COMISIONES, $candidata["idh"]);
  $candidata["hoguera"] = $comision->hoguera;
	return $candidata;
}
