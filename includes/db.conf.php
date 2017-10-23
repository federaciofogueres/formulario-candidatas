<?php
include_once("rb.php");
R::setup('mysql:host=localhost;dbname=ffsj_candidatas','ffsjcandim','Qgkw5_30');

define( 'CANDIDATAS', 'ffsj_candidatas' );
define( 'ADULTAS', 'adultas' );
define( 'COMISIONES', 'comisiones' );

R::ext('xload', function( $type, $id ){
     return R::getRedBean()->load( $type, $id );
});
