<?php
include_once("rb.php");
R::setup('mysql:host=5.56.62.234;dbname=ffsj_candidatas','ffsjcandim','Qgkw5_30');

define( 'CANDIDATAS', 'ffsj_candidatas' );
define( 'ADULTAS', 'adultas' );
define( 'INFANTILES', 'infantiles' );
define( 'COMISIONES', 'comisiones' );

R::ext('xload', function( $type, $id ){
     return R::getRedBean()->load( $type, $id );
});
