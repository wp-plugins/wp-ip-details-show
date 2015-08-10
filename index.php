<?php 
/*
Plugin Name: Ip Details Show
Plugin URI: http://www.wpajans.net
Description: WordPress Comment List İp Details Show
Version: 1.0
Author: Mustafa KÜÇÜK (WPAJANS)
Author URI: http://www.wpajans.net
License: GNU
*/
function IpSHoWcolumn(){
add_filter( 'manage_edit-comments_columns', 'Ip_comment_column_add' );
function Ip_comment_column_add( $columns ) {
    $columns['Ipshowcomment'] = __( 'Ip Details' );
    return $columns;
}
add_action( 'manage_comments_custom_column', 'Ip_details_column', 10, 2 );
function Ip_details_column( $column, $comment_ID ) {
    if ( 'Ipshowcomment' != $column )
        return;
$whatip = get_comment_author_IP();
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$whatip));
if($query && $query['status'] == 'success') {
 echo "Country : ".$query['country']."<br>";
 echo "countryCode : ".$query['countryCode']."<br>";
 echo "Region Code : ".$query['region']."<br>";
 echo "Region Name : ".$query['regionName']."<br>";
 echo "City : ".$query['city']."<br>";
 echo "Organizition Name : ".$query['org']."<br>";
} 

    $content .= "<div id='replycontainer'>\n";   
    $content .= $editorStr;
    $content .= "</div>\n";  
if ( $table_row ) :
        $content .= '</td></tr></tbody></table>';
    else :
        $content .= '</div></div>';
    endif;
    $content .= "\n</form>\n";
    return $content;
}
}

IpSHoWcolumn();
?>