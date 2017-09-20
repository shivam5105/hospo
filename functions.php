<?php
$curPage = esc_url($_SERVER['PHP_SELF']);

function undo_magic_quotes_array($array)
{
    return is_array($array) ? array_map('undo_magic_quotes_array', $array) : str_replace("\\'", "'", str_replace("\\\"", "\"", str_replace("\\\\", "\\", str_replace("\\\x00", "\x00", $array))));
}

$_GET = undo_magic_quotes_array($_GET);
$_POST = undo_magic_quotes_array($_POST);
$_COOKIE = undo_magic_quotes_array($_COOKIE);
$_FILES = undo_magic_quotes_array($_FILES);
$_REQUEST = undo_magic_quotes_array($_REQUEST);

function login($email, $password, $mysqli)
{
    if($stmt = $mysqli->prepare("SELECT id, username, password, salt, type, full_name FROM users WHERE TRIM(email) COLLATE latin1_bin = ? LIMIT 1"))
    {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $username, $db_password, $salt, $type,$full_name);
        $stmt->fetch();
        $password = hash('sha512', $password . $salt);
	
        if($stmt->num_rows == 1)
        {
            if(checkbrute($user_id, $mysqli) == true)
            {
                return false;
            }
            else
            {
                if($db_password == $password)
                {
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
                    $_SESSION['username'] = $username;
					$_SESSION['type']=$type;
					$_SESSION['full_name']=$full_name;
					
                    $_SESSION['login_string'] = hash('sha512', $password . $user_browser);
                    return true;
                }
                else
                {
                    $now = time();
                    $mysqli->query("INSERT INTO users_login_attempts(user_id, createdon) VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        }
    }
    return false;
}
function checkbrute($user_id, $mysqli)
{
    $now = time();
    $valid_attempts = $now - (2 * 60 * 60); 

    if($stmt = $mysqli->prepare("SELECT createdon FROM users_login_attempts WHERE user_id = ? AND createdon > '$valid_attempts'"))
    {
        $stmt->bind_param('i', $user_id); 
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows > 5)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
function login_check($mysqli)
{
    // Check if all session variables are set 
    if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string']))
    {
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if($stmt = $mysqli->prepare("SELECT password FROM users WHERE id = ? LIMIT 1"))
        {
			$stmt->bind_param('i', $user_id);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows == 1)
            {
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if($login_check == $login_string)
                {
                    // Logged In!!!! 
                    return true;
                }
            }
        }
    }
    return false;
}
function check_exists($field, $val, $table)
{
	global $mysqli;
    $query = "SELECT COUNT(*) AS num_rows FROM $table WHERE $field = $val";
    if($stmt = $mysqli->query($query))
    {
        return $stmt->num_rows;
    }
    return 0;
}
function esc_url($url)
{ 
    if('' == $url)
    {
        return $url;
    } 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url; 
    $count = 1;
    while ($count)
    {
        $url = str_replace($strip, '', $url, $count);
    }
    $url = str_replace(';//', '://', $url); 
    $url = htmlentities($url); 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if($url[0] !== '/')
    {
        return '';
    }
    else
    {
        return $url;
    }
}
function flash( $name = '', $message = '', $class = 'success fadeout-message', $url = '' )
{
    //We can only do something if the name isn't empty
    if( !empty( $name ) )
    {
        //No message, create it
        if( !empty( $message ) && empty( $_SESSION[$name] ) )
        {
            if( !empty( $_SESSION[$name] ) )
            {
                unset( $_SESSION[$name] );
            }
            if( !empty( $_SESSION[$name.'_class'] ) )
            {
                unset( $_SESSION[$name.'_class'] );
            }
 
            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        }
        //Message exists, display it
        elseif( !empty( $_SESSION[$name] ) && empty( $message ) )
        {
            $class = !empty( $_SESSION[$name.'_class'] ) ? $_SESSION[$name.'_class'] : 'success';
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
	if( !empty( $url ) || $url != '' )
    {
		header('Location: '.$url);
		exit();
	}
}
function loginCheck()
{
	global $mysqli;
	if(login_check($mysqli) != true)
	{
		//flash('msg', 'You are not authorized to access this page, please login', 'success', BASEURL .'/index.php');-
		header('Location: '.BASEURL .'/index.php');
		die;
	}
	/*$allowed = array('wizard_create_video_swf_file.php','dashboard_pdf.php','dashboard.php','sms_status.php','wizard_create_video_thumbs.php','wizard_update_client_id.php','wizard_create_bitly_links.php','index.php','login.php','gallery.php','exit.php','register.php', 'API','dbbyajax.php','forgot-password.php','first-login.php');
	$curPage = esc_url($_SERVER['PHP_SELF']);
	$IsAllowed = 'false';
	foreach($allowed as $elm){
		$pos = strpos($curPage, $elm, 1);
		if($pos){
			$IsAllowed = 'true';
		}
	}
	if(login_check($mysqli) != true){
		$logged = false;
		if($IsAllowed == 'false'){
			//flash('msg', 'You are not authorized to access this page, please login', 'success', BASEURL .'/index.php');
			header('Location: '.BASEURL .'/index.php');
			die;
		}
	}else{
		$logged = true;
	}*/
}

function frenchChars($string)
{
	$normalizeChars = array(
		'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
		'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
		'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
		'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
		'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
		'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
		'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
		'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
	);

	$string = strtr($string, $normalizeChars); /* Translating the letters */

	$search = explode(",","ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,ø,Ø,Å,Á,À,Â,Ä,È,É,Ê,Ë,Í,Î,Ï,Ì,Ò,Ó,Ô,Ö,Ú,Ù,Û,Ü,Ÿ,Ç,Æ,Œ");

	$replace = explode(",","c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,o,O,A,A,A,A,A,E,E,E,E,I,I,I,I,O,O,O,O,U,U,U,U,Y,C,AE,OE");

	$string = str_replace($search, $replace, $string); /* Replacing the letters */

	return $string;
}
function getCleanNameForFile($Str)
{
	$Str = frenchChars(ucwords(strtolower(trim($Str))));
	$Str = str_replace(array("~","`","!","@","#","$","%","^","*",'"',"'",":",";",".",">","<",",","?","|","\\","‘","’",'“','”',","),"",$Str);
	$Str = str_replace(array("{","[","("),"",$Str);
	$Str = str_replace(array("}","]",")"),"",$Str);
	$Str = str_replace(array("&"),"-and-",$Str);
	$Str = str_replace(array("/"),"-or-",$Str);
	$Str = str_replace(array(" "),"-",$Str);
	$Str = str_replace(array("--"),"-",$Str);
	$Str = str_replace(array("-"),"_",$Str);
	return $Str;
}
function serialNo($RowNo,$records_per_page,$CurrPage = 1)
{
	if($CurrPage < 1)
	{
		$CurrPage = 1;
	}
	return (($records_per_page* ($CurrPage-1))+$RowNo);
}
function trBgColor()
{
	global $TblRowClass;
	if($TblRowClass == "" || $TblRowClass == "tblrow2")
	{
		$TblRowClass = "tblrow1";
	}
	else
	{
		$TblRowClass = "tblrow2";
	}
	return $TblRowClass;
}
function htmlize($str)
{
	return htmlentities($str,ENT_QUOTES,'UTF-8');
}
function isNull($text)
{
	if(trim($text) == "" || trim($text) == null)
	{
		$text = "--";
	}
	return $text;
}
function downloadFile($file_name)
{
	if(is_file($file_name))
	{
		// required for IE
		if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off');	}

		// get the file mime type using the file extension
		switch(strtolower(substr(strrchr($file_name, '.'), 1)))
		{
			case 'pdf': $mime = 'application/pdf'; break;
			case 'zip': $mime = 'application/zip'; break;
			case 'jpeg':
			case 'jpg': $mime = 'image/jpg'; break;
			default: $mime = 'application/force-download';
		}
		header('Pragma: public'); 	// required
		header('Expires: 0');		// no cache
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_name)).' GMT');
		header('Cache-Control: private',false);
		header('Content-Type: '.$mime);
		header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: '.filesize($file_name));	// provide file size
		header('Connection: close');
		readfile($file_name);	// push it out
		exit();
	}
}
function validate_ip($ip)
{
    if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false)
    {
        return false;
    }
    return true;
}
function get_ip_address()
{
	$ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
	foreach ($ip_keys as $key)
	{
	    if(array_key_exists($key, $_SERVER) === true)
	    {
	        foreach (explode(',', $_SERVER[$key]) as $ip)
	        {
	            // trim for safety measures
	            $ip = trim($ip);
	            // attempt to validate IP
	            if(validate_ip($ip))
	            {
	                return $ip;
	            }
	        }
	    }
	}
	return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
}
function updateVisitorLog($page_name,$event_id,$client_id)
{
	global $mysqli;
	$ip = get_ip_address();
	$browser_data = $_SERVER['HTTP_USER_AGENT'];
	$mysqli->query("INSERT INTO visitor_log SET ip='".addslashes($ip)."',browser_data='".addslashes($browser_data)."',page_name='".$page_name."',event_id='".$event_id."',client_id='".$client_id."',createdon='".time()."'");
}
function field_start($label = "", $label_for = "", $class = "", $id = "")
{
    $label_for_str = "";
    if(!empty($label_for))
    {
        $label_for_str = 'for="'.$label_for.'"';
    }
    $id_str = "";
    if(!empty($id))
    {
        $id_str = 'id="'.$id.'"';
    }
    ?>
    <div class="field <?php echo $class; ?>" <?php echo $id_str; ?>>
        <label <?php echo $label_for_str; ?>><?php echo $label; ?></label>
        <div class="field-element">
    <?php
}
function field_end()
{
    echo "</div></div>";
}

function submit_button($text = '', $class = "", $id = "")
{
    if(empty($text))
    {
        $text = "Save";
    }
    ?>
    <div class="action">
        <input type="submit" value="<?php echo $text; ?>" <?php if(!empty($id)) { echo 'id="'.$id.'"'; } ?> class="orange-btn <?php echo $class; ?>" /> 
    </div>
    <?php
}
function showErrorMessages()
{
    global $ErrorMessage, $Success;
    
    if(count($ErrorMessage) > 0)
    {
        foreach ($ErrorMessage as $type => $msgs)
        {
            echo "<ul class='error-msg-list ".trim(strtolower($type))."'>";
            foreach ($msgs as $key => $msg)
            {
                echo "<li>".$msg."</li>";
            }
            echo "</ul>";
        }
    }
}
function real_escape_string($arr)
{
    global $mysqli;

    foreach ($arr as $key => $value)
    {
        $arr[$key] = $mysqli->real_escape_string($value);
    }
    return $arr;
}
function createSlug($str, $delimiter = '-')
{
    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', $delimiter.'and'.$delimiter, preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;
}
function trim_data($data)
{
    if(is_array($data) && count($data) > 0)
    {
        foreach ($data as $key => $value)
        {
            if(is_array($value) && count($value) > 0)
            {
                $data[$key] = trim_data($value);
            }
            else
            {
                $data[$key] = trim($value);
            }
        }
    }
    else if(!empty($data))
    {
        $data = trim($data);
    }
    return $data;
}
function removeSlashes($data)
{
    if(is_array($data) && count($data) > 0)
    {
        foreach ($data as $key => $value)
        {
            if(is_array($value) && count($value) > 0)
            {
                $data[$key] = remove_slashes($value);
            }
            else
            {
                $data[$key] = stripslashes($value);
            }
        }
    }
    else if(!empty($data))
    {
        $data = stripslashes($data);
    }
    return $data;
}
function remove_slashes()
{
    global $_POST;
    $_POST = removeSlashes($_POST);
}

function _cleanup_header_comment( $str ) {
    return trim(preg_replace("/\s*(?:\*\/|\?>).*/", '', $str));
}
function get_file_data( $file, $default_headers, $context = '' ) {
    $fp = fopen( $file, 'r' );
    $file_data = fread( $fp, 8192 );
    fclose( $fp );

    $file_data = str_replace( "\r", "\n", $file_data );

    $all_headers = $default_headers;

    foreach ( $all_headers as $field => $regex )
    {
        if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( $regex, '/' ) . ':(.*)$/mi', $file_data, $match ) && $match[1] )
        {
            $all_headers[ $field ] = _cleanup_header_comment( $match[1] );
        }
        else
        {
            $all_headers[ $field ] = '';
        }
    }

    return $all_headers;
}
function get_template_files($working_directory)
{
    $file_headers = array(
        'Template'    => 'Template',
    );
    $files = glob( $working_directory . '*.php' );
    $valid_files = array();
    if ( $files )
    {
        $i = 0;
        foreach ( $files as $file )
        {
            $info = get_file_data( $file, $file_headers );
            if($info['Template'] != "")
            {
                $file_name = str_ireplace($working_directory, "", $file);

                $valid_files[$i]['file_name']           = $file_name;
                $valid_files[$i]['working_directory']   = $working_directory;
                $valid_files[$i]['Template']            = $info['Template'];

                $i++;
            }
        }
    }
    return $valid_files;
}
function sanitize_file_name($file_name)
{
    $extension = strrchr($file_name, '.');
    $file_name = preg_replace('/[^a-zA-Z0-9\-\._]/','', $file_name);
    $file_name = substr($file_name, 0, (strlen($file_name) - strlen($extension)));
    $file_name = str_replace(".", "", $file_name); /* Remove dot(.) so that file name contain 1 dot(.). */
    $file_name = $file_name.$extension;
    return $file_name;
}
function upload_media($media)
{
    global $mysqli;
    $time = time();
    $folders_date   = date("Y/m/d/", $time);
    $org_medias     = "../uploads/org/".$folders_date; 

    if (!file_exists($org_medias))
    {
        $oldmask = umask(0);
        @mkdir($org_medias, 0755, true);
        umask($oldmask);
    }

    $extension = strtolower(pathinfo($media['name'], PATHINFO_EXTENSION));
    $file_name = sanitize_file_name($media['name']);

    $moved = move_uploaded_file($media["tmp_name"], $org_medias .'/'.$file_name);
    
    if($moved)
    {
        $query = $mysqli->query("INSERT INTO media SET
            file_name = '".$mysqli->real_escape_string($file_name)."',
            createdon = '".$time."'");
        if($query)
        {
            return $mysqli->insert_id;
        }
        else
        {
            return 0;           
        }
    }
}
?>