<?php
//$source = "./xmlf";
//$target = "./myEbFolder2";

//full_copy($source, $target);

function full_copy($source, $target) {
   
	if ( is_dir( $source ) ) {		
		if(!file_exists($target)){ 
		   @mkdir( $target );		           
		   echo "Folder < " .$target ." > is created."; 
		   echo "<br/>";		   
		}else{ 
		   echo "Folder < " .$target ." > already exist."; 		   
		   break;		   
		} 
		
		$d = dir( $source );
		while ( FALSE !== ( $entry = $d->read() ) ) {
			if ( $entry == '.' || $entry == '..' ) {
				continue;
			}
			$Entry = $source . '/' . $entry; 
			if ( is_dir( $Entry ) ) {
				full_copy( $Entry, $target . '/' . $entry );
				continue;
			}
			copy( $Entry, $target . '/' . $entry );
		}
 
		$d->close();
	}else {
		copy( $source, $target );
	}
   
}

?>