<?php
session_start();
/*
 *
 *    Скрипт комментариев.
 *    Версия: 1.0 (beta)
 *    Дата: 10.02.2012
 *    Автор: Чернышов Роман
 *    Сайт: http://rche.ru
 *    Эл.почта: houseprog@ya.ru
 *
 */

class Comments extends Controller_Base {

	var $path	= ''; // path to page on comments
	var $table	= 'comments'; // table comments
	var $prefix	= ''; // prefix table comments
	var $event	= '';
	var $key	= 'e34d9147f42016a32a9bab982492323547e121ce'; // sicret key for ajax
	var $login	= false; // login user or email and name
	var $user	= array(); // user info if login
	var $admin	= false; // admin option
	var $gravatar	= false; // avatar from gravatar.com
	//var $capcha	= true; // enable Capcha
	var $paths	= array(); // path's
	
	
function index () {
		$this->event=@$_POST['eventComments'];		
		if(@$_GET['eventComments']=='del' and @$_GET['noajax']==1)$this->event=@$_GET['eventComments'];

		if($this->event=='save') $status=$this->saveComments();
		if($this->event=='del') $status=$this->delComments();
		if($this->event=='edit') $status=$this->editComments();
		if($this->event=='reply') $status=$this->replyComments();
		if($this->event=='')$status=NULL;
		return $status;
	} 

function delComments() {
		$id	= intval($_POST['idd']);
		$passport =$_POST['passport'];
		if($_GET['noajax']==1)
		{
		$id	= intval($_GET['idd']);
		$passport =$_GET['passport'];
		}
		if($passport==md5($this->key.'admin')) 
			{

			$sql="SELECT {$this->prefix}{$this->table}.idd, {$this->prefix}{$this->table}.reply FROM {$this->prefix}{$this->table} 
			WHERE {$this->prefix}{$this->table}.url='".$this->getUrl()."' ORDER BY {$this->prefix}{$this->table}.idd ASC";
			$allComm=$this->registry['DB']->getAll($sql);
			if(count($allComm)>0):
			// subcomments
			foreach($allComm as $item):
				if($item['reply']==0)$sortcomm[$item['idd']]=$item;
				if($item['reply']>0)
					{
					if(isset($path[$item['reply']]))
						{
						$str='$sortcomm';
						foreach($path[$item['reply']] as $pitem):
							$rep=$item['reply'];
							$str.="[$pitem][sub]";
						endforeach;
						$str.="[{$item['reply']}][sub]";

						$str.="[{$item['idd']}]";
		                                $str.='=$item;';

						eval($str);

						foreach($path[$item['reply']] as $pitem):
							$path[$item['idd']][]=$pitem;
						endforeach;

						$path[$item['idd']][]=$item['reply'];
						}
						else
						{
						$sortcomm[$item['reply']]['sub'][$item['idd']]=$item;
						$path[$item['idd']][]=$item['reply'];
						}
					}
		        endforeach;
		        endif;

			$this->tree_delComment($sortcomm,$id);

			if($_GET['noajax']==1):
			$url=explode('?',$_SERVER['REQUEST_URI']);
			header('Location: http://'.$_SERVER['HTTP_HOST'].$url[0]);
			else: echo 'OK'; endif;
			}
	if(empty($_GET['noajax']))exit;
	}

function tree_delComment(&$a_tree,&$id=0) {
	if(count($a_tree)>0)
	foreach($a_tree as $sub)
		{
		if($sub['idd']<>$id and isset($sub['sub']))$this->tree_delComment($sub['sub'],$id);
		if($sub['idd']==$id)
			{
			$sql="DELETE FROM {$this->prefix}{$this->table} WHERE idd = '$id' LIMIT 1";
			$this->registry['DB']->execute($sql);
			if (isset($sub['sub'])) $this->tree_delComment_process($sub['sub']);
			}
		}
	}

function tree_delComment_process(&$a_tree) {
	foreach($a_tree as $sub)
		{
		$sql="DELETE FROM {$this->prefix}{$this->table} WHERE idd = '{$sub['idd']}' LIMIT 1";
		$this->registry['DB']->execute($sql);
		if(isset($sub['sub']))$this->tree_delComment_process($sub['sub']);
		}
	}

function replyComments() {
	if($_SESSION['login']!=""){
	$replyid	= intval($_POST['replyid']);
	$pass_checked=md5($this->user['password'].$this->key);
	$post_url = htmlspecialchars(trim($_POST['posturlComment']));
	if(strlen($post_url)>50 or strlen($post_url)<10) return;
	$url		= $post_url;
	//$urlOpen=$this->getUrl(false, 'open');

	/*if($this->capcha)
		{
		$capcha ='
		<br/>Введите код с картинки: <input type="text" name="capcha" id="Rcapcha" value="" class="inputComment"/><br/>
		<img src="'.$this->paths['capcha'].'" alt="картинка" width="120" height="50"/>
		<br/>';
		}*/

	$form = '
	<form action="" method="post" id="RformComment">
		
		<input name="nameCommentCap" id="RnameCommentCap" value="" type="text">
		
		<td></td>
		<td><input type="checkbox" id="anon" name="anon" value="ON"> Анонимно</td>
		<input name="replyComment" id="RreplyComment" value="'.$replyid.'" type="hidden">
		<input name="loginComment" id="RloginComment" value="'.intval($this->login).'" type="hidden">
		<input name="posturlComment" id="RposturlComment" value="'.$url.'" type="hidden">
		<input name="personaComment" id="RpersonaComment" value="'.$this->user['userID'].'" type="hidden">
		<input name="checkedComment" id="RcheckedComment" value="'.$pass_checked.'" type="hidden">
		<input name="posturlOpenComment" id="RposturlOpenComment" value="'.$urlOpen.'" type="hidden">
	
		<input name="eventComments" id="ReventComment" value="save" type="hidden">
		<input name="noAjax" value="1" type="hidden">
		
		<textarea name="textComment" id="RtextComment" class="textareaComment tinymce"></textarea>
		
		
		
		
		<input value="Комментировать" name="submit" type="submit" class="submitComment"/>
	</form>';
	echo $form;
	exit;
	}
}

function itemComments($username,$date,$text,$img,$id,$autor=false, $userid='') {
	
	$possport=md5($this->key.'admin');
	//if($this->login) 
	if($_SESSION['login']!=""){
		$reply='<a href="javascript://" rel="'.$id.'" class="replyComment" title="Ответить на комментарий: '.$username.'">Ответить</a>';
	}
	if($autor or $this->admin)$edit=' <a href="javascript://" rel="'.$id.'" class="editComment" title="Редактировать комметарий">Редактировать</a>';
	
	if($this->admin) $del=' | <a href="?id='.$id.'&passport='.$possport.'&noajax=1&eventComments=del" onclick="return false" rel="'.$id.'" passport="'.$possport.'" class="delComment" title="Удалить комментарий">Удалить</a>';
	
	if($userid>0)$uslink="/com/profile/default/$userid/";else $uslink='#itemComment-'.$id;

	$out='<div class="itemComment" id="itemComment-'.$id.'">
		<div class="avatarComment">
			
				<img src="'.$img.'" width="48" height="48" border="0" alt="Аватар пользователя: '.$username.'"/></a>
			</div>
		<div class="panelComment">
			<a class="userComment" style="color:#000" title="Смотреть профиль пользователя: '.$username.'">'.$username.'</a>
			<span class="dateComment" title="Дата, время комментария">'.$date.'</span>
		</div>
		<div class="bodyComment">
			'.$text.'
		</div>
		<div class="footerComment">
			
			'.$reply.$edit.$del.'
		</div>
	';
	return $out;
	
}

function outComments() {
	echo '<div id="rcheComments">
	<h3 class="titleComment">Комментарии</h3>
	<div id="allComment">';
	$sql="SELECT {$this->prefix}{$this->table}.*,users.login, users.id FROM {$this->prefix}{$this->table} 
		LEFT JOIN users ON {$this->prefix}{$this->table}.user =users.id
		WHERE {$this->prefix}{$this->table} .url='".$this->getUrl()."' ORDER BY {$this->prefix}{$this->table}.idd ASC";
	$allComm=$this->registry['DB']->getAll($sql);

	if(count($allComm)>0):
	// subcomments
	foreach($allComm as $item):
		if($item['reply']==0)$sortcomm[$item['idd']]=$item;
		if($item['reply']>0)
			{
			if(isset($path[$item['reply']]))
				{
				$str='$sortcomm';
				foreach($path[$item['reply']] as $pitem):
					$rep=$item['reply'];
					$str.="[$pitem][sub]";
				endforeach;
				$str.="[{$item['reply']}][sub]";

				$str.="[{$item['idd']}]";
                                $str.='=$item;';

				eval($str);

				foreach($path[$item['reply']] as $pitem):
					$path[$item['idd']][]=$pitem;
				endforeach;

				$path[$item['idd']][]=$item['reply'];
				}
				else
				{
				$sortcomm[$item['reply']]['sub'][$item['idd']]=$item;
				$path[$item['idd']][]=$item['reply'];
				}
			}
        endforeach;
	$this->tree_print($sortcomm);

	else: echo '<p>Комментариев нет</p>'; endif;


	echo '</div>
	<div id="messComment"></div>
	<div id="ajaxComment"></div>';

	echo $this->pageComment();
	echo $this->formComment();
	}

function tree_print(&$a_tree) {
	foreach($a_tree as $sub)
		{
		$this->outItem($sub);
		if(!empty($sub['sub']))$this->tree_print($sub['sub']);
		echo "</div>";
		}
	}

function outItem($item) {
        $autor=false;	
		if($this->gravatar)
			{
			$lowercase = strtolower($item['email']);
			//$image = md5( $lowercase );
			//$img="http://www.gravatar.com/avatar.php?gravatar_id=$image";
			$img='/comments/images/boy48.gif';	
			} 
		else $img='/comments/images/boy48.gif';		
	//if($item['pass']==$_COOKIE['comment'.$item['idd']] and !empty($item['pass']) and ($item['date']+120)>time()) $autor=true;
	echo $this->itemComments(
		$item['name'],
		$this->get_Date($item['date']),
		html_entity_decode($item['comment']),
		$img,
		$item['idd'],
		$autor,
		$item['id']);
}

function saveComments() {
	if($_SESSION['login']!=""){
	$persona= $_SESSION['id'];		
			$select = mysql_query("SELECT users.* FROM users
				WHERE users.id='$persona' LIMIT 1");
			$select2 = mysql_query("SELECT professor.* FROM professor
			WHERE professor.users_id='$persona' LIMIT 1");
			$myrow2 = mysql_fetch_array($select2);
			if($myrow2['email']==NULL){
				$select2 = mysql_query("SELECT schoolboy.* FROM schoolboy
				WHERE schoolboy.Users_id='$persona' LIMIT 1");
				$myrow2 = mysql_fetch_array($select2);
			}
			$myrow = mysql_fetch_array($select);
	
	$email 	= $myrow2['email'];
	
	$text 	= PHP_slashes(htmlspecialchars(markhtml(trim(rawurldecode($_POST['textComment'])))));
	$post_url = htmlspecialchars(trim($_POST['posturlComment']));
//	$urlOpen = htmlspecialchars(trim($_POST['posturlOpenComment']));
        $error	= false;
	$login = intval($_POST['loginComment']);
	$replyComment = intval($_POST['replyComment']);
	$cap=$_POST['nameCommentCap'];
	
	/*if($this->capcha) {
		if($_SESSION['captha_text']!=$_POST['capcha']) {
			echo 'ERR5';
			exit;
	         	}
		}*/
	
	
			$user=$myrow['id'];			
			$name=$myrow['login'];
					
			$this->login=true;

			$lowercase = strtolower($item['email']);
			//$image = md5( $lowercase );
			//$img="http://www.gravatar.com/avatar.php?gravatar_id=$image";
			$img='/comments/images/boy48.gif';			
		//$img=$this->user['photo'];
		//$im=explode('/',$img);
              //  $img='/images/'.$this->user['userID'].'/48/48/1/'.$im['4'];

	if(strlen($text)==0){$error=true;$msg=3;}
	if(strlen($post_url)>50 or strlen($post_url)<10){$error=true;$msg=4;}

	if($error)
		{
		echo 'ERR'.$msg;
		exit;
		}
	
	//$pass=$this->generate_password(8);

	$date=$this->get_Date();
	$time=time();
//	echo $_POST['anon'];
	if($_POST['anon']=="true"){
		$user="0";			
		$name="Аноним";	
		
	}	
		$sql="INSERT INTO {$this->prefix}{$this->table} (`reply`,`user`,`name`,`email`,`comment`,`date`,`url`)
			VALUE ('$replyComment','$user','$name','$email','$text','$time','$post_url')";
		$this->registry['DB']->execute($sql);
	
	$lastId=$this->registry['DB']->id;
//	setcookie('comment'.$lastId,$pass,$time+120,'/');

	if(intval($_POST['noAjax'])<>1):
	echo $this->itemComments(
		$name,
		$date,
		html_entity_decode($text),
		$img,
		$lastId,
		true,
		$user);

		exit;
	endif;
	}
}
function formComment($replyid=0)
	{
	global $user;
	if($_SESSION['login']!=""){
	if($this->login)
		{
		$pass_checked=md5($this->user['password'].$this->key);
		}
		else 
		{
		$name='
		<tr><td class="section-one">Имя</td><td>
		<input name="nameComment" id="nameComment" value="" type="text" class="inputComment">
		<input name="nameCommentCap" id="nameCommentCap" value="" type="text" class="nameCommentCap">
		</td></tr>
		<tr><td class="section-one">Эл. почта</td><td><input name="emailComment" id="emailComment" value="" type="text" class="inputComment"></td></tr>';
		}

	$url=$this->getUrl();
	//$urlOpen=$this->getUrl(false, 'open');

	/*if($this->capcha)
		{
		$capcha ='
		<tr><td class="section-one">Введите код с картинки:<br/><img src="'.$this->paths['capcha'].'" alt="картинка" width="120" height="50"/></td><td>
		<input type="text" name="capcha" id="capcha" value="" class="inputComment"/></td></tr>';
		}*/
	
	$form = '<h3 id="newComment">Оставить свой комментарий </h3>
	<form action="" method="post" id="formComment">
		<input name="addComment" id="addComment" value="1" type="hidden">
		<input name="loginComment" id="loginComment" value="'.intval($this->login).'" type="hidden">
		<input name="posturlComment" id="posturlComment" value="'.$url.'" type="hidden">
		<input name="posturlOpenComment" id="posturlOpenComment" value="'.$urlOpen.'" type="hidden">
		<input name="personaComment" id="personaComment" value="'.@$this->user['userID'].'" type="hidden">
		<input name="checkedComment" id="checkedComment" value="'.@$pass_checked.'" type="hidden">
		<input name="eventComments" id="eventComment" value="save" type="hidden">
		<input name="noAjax" value="1" type="hidden">
		<table id="tableComment">		
		'.$name.'
		<td></td>
		<td><input type="checkbox" name="anon" id="anon" value = "ON">Анонимно</td>
		<tr>		
		<td class="section-one">Текст комментария</td><td><textarea name="textComment" id="textComment" class="textareaComment tinymce"></textarea></td></tr>
		
		</table>
		<input value="Комментировать" name="submit" type="submit" class="submitComment"/>
	</form>';

	return $form;
	}
	}

function pageComment() {
	//return $out;
	}
function getUrl($explode=false, $open = '') {
		$url=$_SERVER["REQUEST_URI"];			
		if($open=='open')return urlencode($url);
		return md5($url);
	}

function emailCheck($email) {
	   if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email)))
		{
		 return false;
		}
		else return true;
	}

function get_Date($shtamp='') {
		if($shtamp=='')$shtamp=time();
		$MonthNames=array("Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
		$date 	= date('d',$shtamp).' '.$MonthNames[date('n',$shtamp)-1].' '.date('Y',$shtamp).'г, '.date('H',$shtamp).'ч '.date('i',$shtamp).'мин';
		return $date;
	}

	/*function generate_password($number)
	  {
	    $arr = array('a','b','c','d','e','f',
                 'g','h','i','j','k','l',
                 'm','n','o','p','r','s',
                 't','u','v','x','y','z',
                 'A','B','C','D','E','F',
                 'G','H','I','J','K','L',
                 'M','N','O','P','R','S',
                 'T','U','V','X','Y','Z',
                 '1','2','3','4','5','6',
                 '7','8','9','0'); /*,'.',',',
                 '(',')','[',']','!','?',
                 '&','^','%','@','*','$',
                 '<','>','/','|','+','-',
                 '{','}','`','~');
	    $pass = "";
	    for($i = 0; $i < $number; $i++)
	    {   	
	      $index = rand(0, count($arr) - 1);
	      $pass .= $arr[$index];
	    }
	    return $pass;
	  }*/

}
?>