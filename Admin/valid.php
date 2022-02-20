<?php
    include('db.php');
	
	//++++++++Character Only+++++++++++++++
	function Namevalid($names,$nametital,$length)
	{
		$x=strlen($names);
		if($x<$length)
		{
			return $nametital."(Min Length $length)".",";
		}
        else if(!preg_match('/^[_a-z]+$/i',$names))
         {
         return $nametital.",";
         }
	}

	//++++++++Character Only+++++++++++++++
	function Namespacevalid($names,$nametital,$length)
	{
		$x=strlen($names);
		if($x<$length)
		{
			return $nametital."(Min Length $length)".",";
		}
        else if(!preg_match('/^[_a-z ]+$/i',$names))
         {
         return $nametital.",";
         }
	}

	//++++++++Number Valid+++++++++++++++
	function OnlyNumbervalid($names,$nametital)
	{
	 if(!preg_match('/^[_0-9]+$/i',$names))
         {
         return $nametital.",";
         }
	}


	//++++++++Number Valid+++++++++++++++
	function Numbervalid($names,$nametital,$length)
	{
         $x=strlen($names);
		if($x<$length)
		{
			return $nametital."(Min Length $length)".",";
		}
        else if(!preg_match('/^[_0-9]+$/i',$names))
         {
         return $nametital.",";
         }
	}

	//++++++++Full Name Only+++++++++++++++
	function Fullnamevalid($names,$nametital)
	{
         if(!preg_match('/^[_a-z]+( [_a-z]+)$/i',$names))
         {
         return $nametital.",";
         }
	}

	//++++++++Not Empty+++++++++++++++
	function nullvalid($names,$nametital)
	{
		if($names=="")
		{
         return $nametital.",";
		}	
	}
	//++++++++Not Empty length+++++++++++++++
	function nullvalidlength($names,$nametital,$length)
	{
		$x=strlen($names);
		if($x<$length)
		{
			return $nametital."(Min Length $length)".",";
		}
		else if($names=="")
		{
         return $nametital.",";
		}	
	}

	//++++++++Phone No+++++++++++++++
	function phonevalid($names,$nametital,$length)
	{
		 $x=strlen($names);
		 if($x!=$length)
		{
				return $nametital."(Min Length $length)".",";
		}
		else if(!preg_match('/[0-9 -()+]+$/', $names))
		{
				return $nametital.",";
		}

	}
    
	//++++++++Email Valid+++++++++++++++
	function EmailValid($names,$nametital)
	{
		if(!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $names))
		{
			 return $nametital.",";
		}
	}

	//++++++++Equal String+++++++++++++++
	function EqualValid($names1,$names2,$nametital)
	{
		if($names1!=$names2)
		{
			 return $nametital.",";
		}
	}

	//++++++++From Database+++++++++++++++
	function DatbaseValid($Tablenm,$colmnm,$valuechk,$nametital)
	{
	$select_table = "select * from $Tablenm where $colmnm='".$valuechk."'";
	$fetch= mysql_query($select_table);
	if(mysql_num_rows($fetch)>=1)
		{
		 return $nametital.",";
		}
	}

	//++++++++From Database+++++++++++++++
	function DatbaseValidTWO($Tablenm,$colmnm,$valuechk,$colmnm1,$valuechk1,$nametital)
	{
	$select_table = "select * from $Tablenm where $colmnm='".$valuechk."' and $colmnm1='".$valuechk1."'";
	$fetch= mysql_query($select_table);
	if(mysql_num_rows($fetch)>=1)
		{
		 return $nametital;
		}
	}
?><?php
/*
Namevalid("sadfssf","valid name","3");
Namespacevalid("sadfssf","valid name","3");
Numbervalid("22","valid number","2");
Fullnamevalid("asdsa afdasf","Valid full Name");
nullvalid("s","Valid null");
phonevalid("2222222222","Valid Ph","10");
EmailValid("dasfa@adad.in","Valid Mail");
EqualValid("1","1","Not Match");
DatbaseValid("halbum","ID","51","All Ready Exit");
nullvalidlength("s","Valid null","10");
*/
?>