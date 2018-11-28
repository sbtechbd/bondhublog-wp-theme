<?php
function online_bondhu(){
$time=time();
$ck=$_SERVER['REMOTE_ADDR'];
$ckk=mysql_query("select * from bondhu_online where ck='$ck'");
if(mysql_num_rows($ckk)==0){
mysql_query("insert into bondhu_online (time,ck) values ('$time','$ck')");
}else{
mysql_query("update bondhu_online set time='$time' where ck='$ck'");
}
if ( is_user_logged_in() ) {
					global $current_user;
      				get_currentuserinfo();
				  $usr=$current_user->display_name;
  $usra=$current_user->ID;
				  $usrid=$current_user->user_email ;
				  $ck=mysql_num_rows(mysql_query("select id from bondhu_online where id='$usrid'"));
				  if($ck==0){
				  mysql_query("insert into bondhu_online (id,name,time,type,ck) values ('$usrid','$usr','$time','user','$usra')");
				  }else{
				  mysql_query("update bondhu_online set time='$time' where id='$usrid'");
				  }
				 }
				 $old=$time-10*60*60;
				
				  $shw=mysql_query("select id,name,ck from bondhu_online where time>$old and type='user'");
				  $reg=mysql_num_rows($shw);
				  $nonuser=mysql_fetch_array(mysql_query("select count(ck) from bondhu_online where time>$old and type=''"));
				  $tot=$reg+$nonuser[0];
				echo"<ul>";
				  while($fol=mysql_fetch_array($shw)){
				  echo "<li> ".get_avatar($fol[0],23)." <a href=\"http://bondhublog.com/?author=$fol[2]\">$fol[1]</a></li>";
				  }
echo"</ul><div style=\"clear:both;\"></div><br/>";
				  echo"<span>অনলাইনে আছেন: ".make_bangla_number($tot)." জন বন্ধু<br/>নিবন্ধিত বন্ধু: ".make_bangla_number($reg)." জন <br/>অনিবন্ধিত বন্ধু:  ".make_bangla_number($nonuser[0])." জন</span>";
				  }
?>