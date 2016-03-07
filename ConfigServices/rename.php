<?php
$path = "./xmlf";
$target = "./myEbFolder2";

function getDirectory( $path = '.', $level = 0 ){

    $ignore = array( 'cgi-bin', '.', '..' );

    $dh = @opendir( $path );
   
    while( false !== ( $file = readdir( $dh ) ) )
    {
        if( !in_array( $file, $ignore ) )
        {
            $spaces = str_repeat( '&nbsp;', ( $level * 4 ) );
            if( is_dir( "$path/$file" ) )
            {
                echo "<strong>$spaces $file</strong><br />";
                rename($path."/".$file, strtolower($target."/".$file));
                getDirectory( "$path/$file", ($level+1) );
               
            }
            else {
                echo "$spaces $file<br />";
                rename($path."/".$file, strtolower($target."/".$file));
            }
        }  
    }
    closedir( $dh );
}

getDirectory( $path , 0 )



?>