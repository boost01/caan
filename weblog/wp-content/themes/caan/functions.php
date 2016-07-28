<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

automatic_feed_links();

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	));
if ( !function_exists( 'get_avatar' ) ) :
/**
* Retrieve the avatar for a user who provided a user ID or email address.
*
* @since 2.5
* @param int|string|object $id_or_email A user ID,  email address, or comment object
* @param int $size Size of the avatar image
* @param string $default URL to a default image to use if no avatar is available
* @param string $alt Alternate text to use in image tag. Defaults to blank
* @return string <img> tag for the user's avatar
*/
if ( ! get_option('show_avatars') )
	return false;
	if ( false === $alt)
		$safe_alt = '';
	else
		$safe_alt = esc_attr( $alt );
	
	        if ( !is_numeric($size) )
	                $size = '96';
	
	        $email = '';
	        if ( is_numeric($id_or_email) ) {
	                $id = (int) $id_or_email;
	                $user = get_userdata($id);
	                if ( $user )
	                        $email = $user->user_email;
	        } elseif ( is_object($id_or_email) ) {
	                // No avatar for pingbacks or trackbacks
	                $allowed_comment_types = apply_filters( 'get_avatar_comment_types', array( 'comment' ) );
	                if ( ! empty( $id_or_email->comment_type ) && ! in_array( $id_or_email->comment_type, (array) $allowed_comment_types ) )
	                        return false;
	
	                if ( !empty($id_or_email->user_id) ) {
	                        $id = (int) $id_or_email->user_id;
	                        $user = get_userdata($id);
	                        if ( $user)
	                                $email = $user->user_email;
	                } elseif ( !empty($id_or_email->comment_author_email) ) {
	                        $email = $id_or_email->comment_author_email;
	                }
	        } else {
	                $email = $id_or_email;
	        }
	
	        if ( empty($default) ) {
	                $avatar_default = get_option('avatar_default');
	                if ( empty($avatar_default) )
	                        $default = 'mystery';
	                else
	                        $default = $avatar_default;
	        }
	
	        if ( !empty($email) )
	                $email_hash = md5( strtolower( $email ) );
	
	        if ( is_ssl() ) {
	                $host = 'https://secure.gravatar.com';
	        } else {
	                if ( !empty($email) )
	                        $host = sprintf( "http://%d.gravatar.com", ( hexdec( $email_hash{0} ) % 2 ) );
	                else
	                        $host = 'http://0.gravatar.com';
	        }
	
	        if ( 'mystery' == $default )
	                $default = "$host/avatar/ad516503a11cd5ca435acc9bb6523536?s={$size}"; // ad516503a11cd5ca435acc9bb6523536 == md5('unknown@gravatar.com')
	        elseif ( 'blank' == $default )
	                $default = includes_url('images/blank.gif');
	        elseif ( !empty($email) && 'gravatar_default' == $default )
	                $default = '';
	        elseif ( 'gravatar_default' == $default )
	                $default = "$host/avatar/s={$size}";
	        elseif ( empty($email) )
	                $default = "$host/avatar/?d=$default&amp;s={$size}";
	        elseif ( strpos($default, 'http://') === 0 )
	                $default = add_query_arg( 's', $size, $default );
	
	        if ( !empty($email) ) {
	                $out = "$host/avatar/";
	                $out .= $email_hash;
	                $out .= '?s='.$size;
	                $out .= '&amp;d=' . urlencode( $default );
	
	                $rating = get_option('avatar_rating');
	                if ( !empty( $rating ) )
	                        $out .= "&amp;r={$rating}";
	
	                $avatar = "<img alt='{$safe_alt}' src='{$out}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
	        } else {
	                $avatar = "<img alt='{$safe_alt}' src='{$default}' class='avatar avatar-{$size} photo avatar-default' height='{$size}' width='{$size}' />";
	        }
	
	        return apply_filters('get_avatar', $avatar, $id_or_email, $size, $default, $alt);
	endif;

?>
