<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>
		White Lake Cheese Portal - Document Store
	</title>
	<?php
session_start();
ob_start();
if (isset($_SESSION['AddStaff_First_Name']))
{
	unset($_SESSION['$UserGeneratedUsername']);
									unset($_SESSION['$UserAddStaff_Password']);
									unset($_SESSION['$UserAddStaff_First_Name']);
									unset($_SESSION['$UserAddStaff_Last_Name']);
									unset($_SESSION['$UserAddStaff_Email']);
									unset ($_SESSION['AddStaff_First_Name']);
									unset ($_SESSION['AddStaff_Last_Name']);
							unset ($_SESSION['AddStaff_Job_Role']);
							 unset ($_SESSION['AddStaff_Account_Type']);
							 unset ($_SESSION['AddStaff_Employment_Start']);
							unset ($_SESSION['AddStaff_Employment_End']);
							unset ($_SESSION['AddStaff_DOB']);
							unset ($_SESSION['AddStaff_Address1']);
							unset ($_SESSION['AddStaff_Address2']);
							unset ($_SESSION['AddStaff_Address3']);
							unset ($_SESSION['AddStaff_Postcode']);
							unset ($_SESSION['AddStaff_Phone_No']);
							unset ($_SESSION['AddStaff_Email']);
							unset ($_SESSION['GeneratedUsername']);
							unset ($_SESSION['AddStaff_Password']);
							
									unset($_SESSION['$Name']);
									unset($_SESSION['$Description']);
									unset($_SESSION['$Milk_Type']);
									unset($_SESSION['$Pastuerised_Stat']);
									unset($_SESSION['$Rennet']);
									unset ($_SESSION['Style']);
									unset ($_SESSION['Weight_Est']);
							unset ($_SESSION['Origin']);
							 unset ($_SESSION['Quantity']);
							 unset ($_SESSION['Price']);
							unset ($_SESSION['Prod_Stat']);
}
?>	
</head>
<body class="Len">
	<div class='PortalHeader'><a name="adminnotice" class="DocStoreLinks"> </a>
		<table class="portal" width="100%" style="text-align:right">
			<tr>
				<td rowspan="4" width="40%">
					<a href="PortalHome.php">
					<img src="WhiteLakeLogoNoTxt.png" align="left" width="100%" alt="White Lake Cheese Logo">
					</a>
				</td>
				<td rowspan="4" width="35%">
					<h1 style="padding-top:30px;">
						Portal
					</h1>
				</td>
				<td>
					<p >Todays Date: <span id="datetime"></span></p>
					<script>
					var dt = new Date();
					document.getElementById("datetime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"/"+ (("0"+(dt.getMonth()+1)).slice(-2))+"/"+ (dt.getFullYear());
					</script>
				</td>
			</tr>
			<tr>
				<td>
					<?php
					   if (isset($_SESSION['Username']))
						{
							$Username = $_SESSION['Username'];
							$Account_Type = $_SESSION['Account_Type'];
							include('connect.php');
							$sqlAccount = "SELECT * FROM account WHERE Username='$Username'";
								$resultAccount = mysqli_query($conn,$sqlAccount);
								
								while ($rowAccountType = mysqli_fetch_array($resultAccount))
									{
										$Account_TypeCheck = $rowAccountType[4];
										$_SESSION['Account_Type'] = $Account_TypeCheck;
										$Account_Type = $_SESSION['Account_Type'];
									}
							$Staff_ID = $_SESSION['Staff_ID'];
							$PassChange = $_SESSION['PassChange'];
							$First_Name_User = $_SESSION['First_Name'];
							$Last_Name_User = $_SESSION['Last_Name'];
							$AccountEmail = $_SESSION['AccountEmail'];
							$loggedin = $_SESSION['loggedin'];
							$SecCheck = $_SESSION['SecCheck'];
							if ($SecCheck == 1)
							{
								if((time() - $_SESSION['last_login_timestamp']) > 1800) // 1800 =  30 * 60
								{
									header("Location:LogoffTimeOut.php");
								}
								else{
									$_SESSION['last_login_timestamp'] = time();
								}
							}
							else
							{
								if((time() - $_SESSION['last_login_timestamp']) > 900) // 900 =  15 * 60
								{
									header("Location:LogoffTimeOut.php");
								}
								else{
									$_SESSION['last_login_timestamp'] = time();
								}
							}
							echo"Welcome back $First_Name_User $Last_Name_User";
							
						}
					 else
					 {
						echo"Username not detected";
						header("location:LoginError.php");
					 }
					if ($loggedin != 1)
					{
						session_start();
session_destroy();
						header("location:LoginError.php");
					}
					else
					{
						
					}
					if ($PassChange == 'Yes')
					{
						header("location:ChangePass.php");
					}
						
					?>
			</td>
	</div>
			</tr>
			<tr>
				<td style="text-align:middle;">
					<a href="Logoff.php"> Log off Portal </a> <a href="Logoff.php"> <img src="LogoffIcon.png" alt="Log off Icon" HSPACE="5" VSPACE="0"> </a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="AccountSettings.php"> Account Settings</a> <a href="#"> <img src="SettingButton.png" width="10%" alt="Settings Icon"> </a>
				</td>
			</tr>
		</table>	
	</div>
	<br>
	<div class="PortalNav">
		<table>
			<tr>
				<td style="text-align:center; border-top:3px solid blue">
					<b>Company Resources</b>
				</td>
			</tr>
			<tr>
				<td>
					<a href="StockTable.php">Stock Table</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="MarketStockTable.php">Market Stock</a>
				</td>
			</tr>
			
			<tr>
				<td>
					<a href="Homepage.html" target="_blank">Company Homepage</a>
				</td>
			</tr>
			<?php
			if ($Account_Type < 5)
			{
				
			}
			else
			{
				echo "<tr>
				<td>
					<a href='AddStaff.php' target=''>Add Staff</a>
				</td>
			</tr>";
			}		?><?php
			if ($Account_Type < 4)
						{
							
						}
			else{
				echo"
			<tr>
				<td>
					<a href='ViewStaff.php' target=''>View Staff Members</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href='AddStock.php' target=''>Add Stock</a>
				</td>
			</tr>";	
			}						
			?>	
			<tr>
				<td style="text-align:center; border-top:3px solid blue">
					<b>Useful Links</b>
				</td>
			</tr>
			<tr>
				<td class="selected"> 
					<a href="DocumentStore.php">Document Store</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="WageCalculator.php">Wage Calculator</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="CompanyCalender.php">Company Calender</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="CompanyContacts.php">Contacts</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="StaffPortalUserGuides.php">Staff Portal User Guides</a>
				</td>
			</tr>
		</table>
	</div>
	<div class="PortalContent" style="border-top:3px solid blue; display:inline-block; width=40%">
		<table>
			<tr>
				<td style="color: 0032b5;">
					<b>Welcome to the White Lake Cheese Staff Portal - Document Store</b> 
				</td>
			</tr>
			
			</table>
			<?php
			if($Account_Type<4)
			{
				
			}
			else
			{
					echo"<table class='LoginTbl'>
					<form action='' method='post' enctype='multipart/form-data'>

								<label>Upload Document to Company Document Store</label>
									<span class='btn btn-default btn-file'>
										Browse <input name='DocumentStore' type='file' accept='application/pdf'>
									</span>
								<br/><br/>
								<input type='submit' name='submit' class='btn-success' value='submit'>
							</form>";
			}?>
				<?php 
					if (isset($_POST['submit'])) {
						
						
						include('connect.php');
						$Staff_ID = $Staff_ID;
						$folder_path = 'DocumentStoreFiles/';

						$File_name = basename($_FILES['DocumentStore']['name']);
						$newname = $folder_path . $File_name;
						if ($_FILES['DocumentStore']['type'] == "application/pdf")
						{
							if (move_uploaded_file($_FILES['DocumentStore']['tmp_name'], $newname))
							{

								$filesql = "INSERT into Docstore (Staff_ID,File_Name) Values('$Staff_ID','$newname')";
								$fileresult = mysql_query($filesql);
							}
							else
							{

								echo "<p>Upload Failed.</p>";
							}

							if (isset($fileresult))
							{
								echo 'File Successfully uploaded';
							} else
							{
								echo 'Upload Fail';
							}
						}
						else
						{
							echo "<p>Document uploaded must be in PDF format.</p>";
						}

					}
					?>
				</table >
				
		<p>
		Please use the our navigation system below to help find the document you are looking for with ease.
		</p>
		<ul align="middle">
			<button class="DocStoreBtn" onclick="location.href='#ListA'" style = "font-size: 12px; padding: 10px;">A </button>
			<button class="DocStoreBtn" onclick="location.href='#ListB'" style = "font-size: 12px; padding: 10px;">B </button>
			<button class="DocStoreBtn" onclick="location.href='#ListC'" style = "font-size: 12px; padding: 10px;">C </button>
			<button class="DocStoreBtn" onclick="location.href='#ListD'" style = "font-size: 12px; padding: 10px;">D </button>
			<button class="DocStoreBtn" onclick="location.href='#ListE'" style = "font-size: 12px; padding: 10px;">E </button>
			<button class="DocStoreBtn" onclick="location.href='#ListF'" style = "font-size: 12px; padding: 10px;">F </button>
			<button class="DocStoreBtn" onclick="location.href='#ListG'" style = "font-size: 12px; padding: 10px;">G </button>
			<button class="DocStoreBtn" onclick="location.href='#ListH'" style = "font-size: 12px; padding: 10px;">H </button>
			<button class="DocStoreBtn" onclick="location.href='#ListI'" style = "font-size: 12px; padding: 10px;">I </button>
			<button class="DocStoreBtn" onclick="location.href='#ListJ'" style = "font-size: 12px; padding: 10px;">J </button>
			<button class="DocStoreBtn" onclick="location.href='#ListK'" style = "font-size: 12px; padding: 10px;">K </button>
			<button class="DocStoreBtn" onclick="location.href='#ListL'" style = "font-size: 12px; padding: 10px;">L </button>
			<button class="DocStoreBtn" onclick="location.href='#ListM'" style = "font-size: 12px; padding: 10px;">M </button>
			<button class="DocStoreBtn" onclick="location.href='#ListN'" style = "font-size: 12px; padding: 10px;">N </button>
			<button class="DocStoreBtn" onclick="location.href='#ListO'" style = "font-size: 12px; padding: 10px;">O </button>
			<button class="DocStoreBtn" onclick="location.href='#ListP'" style = "font-size: 12px; padding: 10px;">P </button>
			<button class="DocStoreBtn" onclick="location.href='#ListQ'" style = "font-size: 12px; padding: 10px;">Q </button>
			<button class="DocStoreBtn" onclick="location.href='#ListR'" style = "font-size: 12px; padding: 10px;">R </button>
			<button class="DocStoreBtn" onclick="location.href='#ListS'" style = "font-size: 12px; padding: 10px;">S </button>
			<button class="DocStoreBtn" onclick="location.href='#ListT'" style = "font-size: 12px; padding: 10px;">T </button>
			<button class="DocStoreBtn" onclick="location.href='#ListU'" style = "font-size: 12px; padding: 10px;">U </button>
			<button class="DocStoreBtn" onclick="location.href='#ListV'" style = "font-size: 12px; padding: 10px;">V </button>
			<button class="DocStoreBtn" onclick="location.href='#ListW'" style = "font-size: 12px; padding: 10px;">W </button>
			<button class="DocStoreBtn" onclick="location.href='#ListX'" style = "font-size: 12px; padding: 10px;">X </button>
			<button class="DocStoreBtn" onclick="location.href='#ListY'" style = "font-size: 12px; padding: 10px;">Y </button>
			<button class="DocStoreBtn" onclick="location.href='#ListZ'" style = "font-size: 12px; padding: 10px;">Z </button>
			
		</ul>
		<?php $FileNo = 0; ?>
		<h2 class="DocStoreHeader"> <a name="ListA" class="DocStoreLinks">A</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'a' xor $filenameFirstChar == 'A')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListB" class="DocStoreLinks">B</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'b' xor $filenameFirstChar == 'B')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListC" class="DocStoreLinks">C</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'c' xor $filenameFirstChar == 'C')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListD" class="DocStoreLinks">D</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'd' xor $filenameFirstChar == 'D')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListE" class="DocStoreLinks">E</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'e' xor $filenameFirstChar == 'E')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListF" class="DocStoreLinks">F</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'f' xor $filenameFirstChar == 'F')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListG" class="DocStoreLinks">G</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'g' xor $filenameFirstChar == 'G')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListH" class="DocStoreLinks">H</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'h' xor $filenameFirstChar == 'H')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListI" class="DocStoreLinks">I</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'i' xor $filenameFirstChar == 'I')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListJ" class="DocStoreLinks">J</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'j' xor $filenameFirstChar == 'J')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListK" class="DocStoreLinks">K</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'k' xor $filenameFirstChar == 'K')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListL" class="DocStoreLinks">L</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'l' xor $filenameFirstChar == 'L')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListM" class="DocStoreLinks">M</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'm' xor $filenameFirstChar == 'M')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListN" class="DocStoreLinks">N</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'n' xor $filenameFirstChar == 'N')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListO" class="DocStoreLinks">O</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'o' xor $filenameFirstChar == 'O')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListP" class="DocStoreLinks">P</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'p' xor $filenameFirstChar == 'P')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListQ" class="DocStoreLinks">Q</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'q' xor $filenameFirstChar == 'Q')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListR" class="DocStoreLinks">R</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'r' xor $filenameFirstChar == 'R')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListS" class="DocStoreLinks">S</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 's' xor $filenameFirstChar == 'S')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListT" class="DocStoreLinks">T</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 't' xor $filenameFirstChar == 'T')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListU" class="DocStoreLinks">U</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'u' xor $filenameFirstChar == 'U')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListV" class="DocStoreLinks">V</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'v' xor $filenameFirstChar == 'V')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListW" class="DocStoreLinks">W</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'w' xor $filenameFirstChar == 'W')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListX" class="DocStoreLinks">X</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'x' xor $filenameFirstChar == 'X')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListY" class="DocStoreLinks">Y</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'y' xor $filenameFirstChar == 'Y')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
		<h2 class="DocStoreHeader"><a name="ListZ" class="DocStoreLinks">Z</a></h2>
		<?php
$dir_open = opendir('DocumentStoreFiles/');

while(false !== ($filename = readdir($dir_open))){
    if($filename != "." && $filename != "..")
	{
		$filenameFirstChar = $filename[0];
		$filenameFirstChar = substr($filename, 0, 1);
		
			$link = "<a href='DocumentStoreFiles/$filename'> $filename </a><br />";
			if($filenameFirstChar == 'z' xor $filenameFirstChar == 'Z')
		{
			$FileNo ++;
			echo $link;
		}
		else
		{
			
		}
    }
}

closedir($dir_open);
?>
<?php
$_SESSION['FileNo'] = $FileNo;
?>
		<a href = "#adminnotice"> Return to Top of Page </a>
		<?php 
		if($Account_Type<4)
		{
			
		}
		else
		{
			echo"| <a href = 'EditDocumentStore.php'>Edit/Remove Documents</a>";
		}
		?>
		
	</div>
	<br>
	<div class="PortalFooter" width="100%">
		<table class="PortalFooter" >
			<tr>
				<td style="text-align:center; border-top:3px solid blue">
					<a href="ContactUsPortal.html" onclick="window.open('ContactUsPortal.html', 
                         'newwindow', 
                         'width=450px,height=500px'); 
              return false;"> Contact Us</a> | <a href="ITUserAgreement.html" onclick="window.open('ITUserAgreement.html', 
                         'newwindow', 
                         'width=450px,height=500px'); 
              return false;"> IT User Agreement</a>
				</td>
			</tr>
			<tr>
				<td>
					<p class="Footer">
						All content copyright &copy; 2018 White Lake Cheese Ltd.
					</p>
				</td>
				</tr>
				<tr>
					<td>
						<p class="Footer">
							All Rights Reserved
						</p>
					</td>
				</tr>
			
		</table>
	</div>
</body>
</head>