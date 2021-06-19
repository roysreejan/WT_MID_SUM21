<?php
	$Name="";
	$err_Name="";
	$Username="";
	$err_Username="";
	$Password="";
	$err_Password="";
    $ConfirmPassword="";
    $err_ConfirmPassword="";
    $Email="";
    $err_Email="";
    $Phone="";
    $err_Phone="";
	$PhoneCode="";
	$Address="";
	$err_Address="";
	$City="";
	$State="";
	$err_CityState="";
	$Postalzipcode="";
	$err_Postalzipcode="";
	$Day="";
    $err_Day="";
    $Month="";
    $err_Month="";
    $Year="";
    $err_Year="";
	$Gender="";
	$err_Gender="";
	$Hears=[];
	$err_Hears="";
	$Bio="";
	$err_Bio="";
	
    $months = array("January","February","March","April","May","June","July","August","September","October","November","December");
    
	
	$hasError=false;
	
	function HearExist($h){
		global $Hears;
		foreach($Hears as $Hear){
			if ($h == $Hear) 
			return true;
		}
		return false;
	}
	
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["Name"])){
			$hasError = true;
			$err_Name="Name Required";
		}
		else
		{
			$Name=htmlspecialchars($_POST["Name"]);
		}
        if(empty($_POST["Username"]))
		{
			$hasError = true;
			$err_Username="Username Required";
		}
		elseif(strlen($_POST["Username"]) <= 5)
		{
			$hasError = true;
			$err_Username="Username must contain at least 6 character";
		}
        elseif(strpos($_POST["Username"], ' ') !== false)
		{
			$hasError = true;
            $err_Username= "Space is not allowed in Username";
        }
		else
		{
			$Username=htmlspecialchars($_POST["Username"]);
		}
        if(empty($_POST["Password"]))
		{
			$hasError = true;
			$err_Password="Password Required";
		}
		elseif(strlen($_POST["Password"]) <= 7)
		{
			$hasError = true;
			$err_Password="Password must contain at least 8 character";   
		}
		elseif(strpos($_POST["Password"], '#') == false)
		{
			$hasError = true;
            $err_Password= "Password must contain # character or one ? character";
		}
		else
		{
			$upper = 0;
			$lower = 0;
			$number = 0;
			$arr = str_split($_POST["Password"]);
			foreach($arr as $a)
			{
				if($a >= 'A' && $a <= 'Z')
					$upper++;
				elseif($a >= 'a' && $a <= 'z')
					$lower++;
				elseif ($a >= 0)
					$number++;
			}
			if($upper >= 1 && $lower >= 1 && $number >= 1)
			{
				$Password = $_POST["Password"];
			}
			else
			{
				$err_Password= "Password must contain 1 number and combination of uppercase and lowercase alphabet";
			}
		}	
        if(empty($_POST["ConfirmPassword"]))
		{
			$hasError = true;
			$err_ConfirmPassword="Confirm Password Required";
		}
        else if($_POST["Password"] !== $_POST["ConfirmPassword"])
		{
            $hasError = true;
			$err_ConfirmPassword="Password and Confirm Password not match";
        }
        else
		{
            $ConfirmPassword=$_POST["ConfirmPassword"];
        }
        if(empty($_POST["Email"]))
		{
			$hasError = true;
			$err_Email="Email Required";
		}
        else if(strpos($_POST["Email"], "@") == false || strpos($_POST["Email"], ".") == false)
		{
            $hasError = true;
			$err_Email="Email must contain @ character and . character";
        }
        else
		{
            $Email=$_POST["Email"];
        }
        if(empty($_POST["Phone"]) || empty($_POST["PhoneCode"]))
		{
			$hasError = true;
			$err_Phone="Phone number & code Required";
		}
        else if(is_numeric($_POST["Phone"]) == false && is_numeric($_POST["PhoneCode"]) == false)
		{
            $hasError = true;
			$err_Phone="Phone number & Code must contain number";
        }
        else
		{
            $Phone=$_POST["Phone"];
			$PhoneCode=$_POST["PhoneCode"];
        }
		if(empty($_POST["Address"]))
		{
			$hasError = true;
			$err_Address="Address Required";
		}
		else
		{
			$Address=$_POST["Address"];
		}
		if(empty($_POST["City"]) || empty($_POST["State"]))
		{
			$hasError = true;
			$err_CityState="City and State Required";
		}
		else
		{
			$City=$_POST["City"];
			$State=$_POST["State"];
		}
		if(empty($_POST["Postalzipcode"]))
		{
			$hasError = true;
			$err_Postalzipcode="Postal/Zip Code Required";
		}
		else if(is_numeric($_POST["Postalzipcode"]) == false)
		{
            $hasError = true;
			$err_Postalzipcode="Postal/Zip Code must contain number";
        }
		else
		{
			$Postalzipcode=$_POST["Postalzipcode"];
		}
		if(!isset($_POST["Day"]))
        {
			$hasError = true;
            $err_Day= "Day required";
        }
        else
        {
            $Day = $_POST["Day"];
        }
        if(!isset($_POST["Month"]))
        {
			$hasError = true;
            $err_Month= "Month required";
        }
        else
        {
            $Month = $_POST["Month"];
        }
        if(!isset($_POST["Year"]))
        {
			$hasError = true;
            $err_Year= "Year required";
        }
        else
        {
            $Year = $_POST["Year"];
        }
		if(!isset($_POST["Gender"]))
		{
			$hasError = true;
			$err_Gender="Gender Required";
		}
		else
		{
			$Gender = $_POST["Gender"];
		}
		if(!isset($_POST["Hears"])){
			$hasError = true;
			$err_Hears="Select Required";
		}
		else{
			$Hears = $_POST["Hears"];
		}
		if(empty($_POST["Bio"]))
		{
			$hasError = true;
			$err_Bio = "Bio Required";
		}
		else
		{
			$Bio = $_POST["Bio"];
		}
	}	
?>
<html>
	<head></head>
	<body>
		<form action="" method="post">
			<fieldset>
				<legend><h1>Club Member Registration</h1></legend>
				<table>
					<tr>
						<td align="right">Name:</td>
						<td><input type="text" name="Name" value="<?php echo $Name; ?>"></td>
						<td><span> <?php echo $err_Name;?> </span></td>
					</tr>
					<tr>
						<td align="right">Username:</td>
						<td><input type="text" name="Username" value="<?php echo $Username; ?>"></td>
						<td><span> <?php echo $err_Username;?> </span></td>
					</tr>
					<tr>
						<td align="right">Password:</td>
						<td><input type="Password" name="Password" value="<?php echo $Password; ?>"></td>
						<td><span> <?php echo $err_Password;?> </span></td>
					</tr>
					<tr>
						<td align="right">Confirm Password:</td>
						<td><input type="Password" name="ConfirmPassword"value="<?php echo $ConfirmPassword; ?>"></td>
						<td><span> <?php echo $err_ConfirmPassword;?> </span></td>
					</tr>
					<tr>
						<td align="right">Email:</td>
						<td><input type="text" name="Email" value="<?php echo $Email; ?>"></td>
						<td><span> <?php echo $err_Email;?> </span></td>
					</tr>
					<tr>
						<td align="right">Phone Number:</td>
						<td><input style="width: 50px" type="text" placeholder="code" name="PhoneCode" value="<?php echo $PhoneCode; ?>"> - <input placeholder="Number" style="width:114px" type="text" name="Phone" value="<?php echo $Phone; ?>"></td>
						<td><span> <?php echo $err_Phone;?> </span></td>
					</tr>
					<tr>
						<td align="right">Address:</td>
						<td><input type="text" name="Address" placeholder="Street Address" value="<?php echo $Address; ?>"></td>
						<td><span> <?php echo $err_Address;?> </span></td>
					</tr>
					<tr>
						<td></td>
						<td> <input style="width: 65px" type="text" name="City" placeholder="City" value="<?php echo $City; ?>"> - <input style="width:100px" type="text" name="State" placeholder="State" value="<?php echo $State; ?>"></td>
						<td><span> <?php echo $err_CityState;?> </span></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="text" name="Postalzipcode" placeholder="Postal/Zip Code" value="<?php echo $Postalzipcode; ?>"></td>
						<td><span> <?php echo $err_Postalzipcode;?> </span></td>
					</tr>
					<tr>
					<td align="right">Birth Date:</td>
						<td><select name="Day" style="width:48px"><option selected disabled>Day</option>
							<?php 
							for($d=1;$d<=31;$d++)
							{
								if($d==$Day)
								{
									echo "<option selected>$d</option>";
								}
								else
								{
									echo "<option>$d</option>";
								}
							}
							?>
							</select><span><?php echo $err_Day;?></span>
							<select name="Month" style="width:70px"><option selected disabled>Month</option>
							<?php
								foreach($months as $m)
								{
									if($m == $Month)
									{
										echo "<option selected>$m</option>";
									}
									else
									{
										echo "<option>$m</option>";
									}
								}
							?>
							</select><span><?php echo $err_Month;?></span>
							<select name="Year" style="width:52px"><option selected disabled>Year</option>
							<?php
								for($y=1970;$y<=2021;$y++)
								{
									if($y==$Year)
									{
										echo "<option selected>$y</option>";
									}
									else
									{
										echo "<option>$y</option>";
									}
								}
							?>
							</select><br><span><?php echo $err_Year;?></span></td>
						</tr>
					<tr>
						<td align="right">Gender: </td>
						<td><input type="radio" value="Male" <?php if($Gender=="Male") echo "checked"; ?> name="Gender"> Male <input name="Gender" <?php if($Gender=="Female") echo "checked"; ?> value="Female" type="radio"> Female </td>
						<td><span> <?php echo $err_Gender;?> </span></td>
					</tr>
					<tr>
						<td align="right">Where did you hear<br>about us?</td>
						<td><input type="checkbox" value="A Friend or Colleague" <?php if(HearExist("A Friend or Colleague")) echo "checked";?> name="Hears[]">A Friend or Colleague<br>
							<input type="checkbox" value="Google" <?php if(HearExist("Google")) echo "checked";?> name="Hears[]">Google<br>
							<input type="checkbox" value="Blog Post" <?php if(HearExist("Blog Post")) echo "checked";?> name="Hears[]">Blog Post<br>
							<input type="checkbox" value="News Article" <?php if(HearExist("News Article")) echo "checked";?> name="Hears[]">News Article<br>
							<span><?php echo $err_Hears;?></span></td>
					</tr>
					<tr>
						<td align="right">Bio: </td>
						<td><textarea name="Bio" rows="2" cols="22"><?php echo $Bio; ?></textarea>
						<td><span> <?php echo $err_Bio;?> </span></td>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="submit" value="register"></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</body>
</html>