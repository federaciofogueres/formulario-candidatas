<?php
function getCandidata($uid, $type){
    if($type == 'adulta'){
        $candidata  = R::findOne( ADULTAS, ' uid = ? ', [$uid]);
    }
    else{
        $candidata  = R::findOne( INFANTILES, ' uid = ? ', [$uid]);
    }
    if($candidata != null){
        $comision = R::xload(COMISIONES, $candidata["idh"]);
        $candidata["hoguera"] = $comision->hoguera;
    }
    return $candidata;
}
