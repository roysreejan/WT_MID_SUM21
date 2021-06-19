<?php
	$name="";
	$err_name="";
	$username="";
	$err_username="";
	$password="";
	$err_password="";
    $confirmpassword="";
    $err_confirmpassword="";
    $email="";
    $err_email="";
    $phonenumber="";
    $err_phonenumber="";
	$phonenumbercode="";
	$address="";
	$err_address="";
	$city="";
	$state="";
	$err_citystate="";
	$postalzipcode="";
	$err_postalzipcode="";
	$Day="";
    $err_Day="";
    $Month="";
    $err_Month="";
    $Year="";
    $err_Year="";
	$gender="";
	$err_gender="";
	$Hears=[];
	$err_Hears="";
	$bio="";
	$err_bio="";
	
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
	
	if(isset($_POST["submit"])){
		if(empty($_POST["name"])){
			$hasError = true;
			$err_name="Name Required";
		}
		else{
			$name = $_POST["name"];
		}
        if(empty($_POST["username"])){
			$hasError = true;
			$err_username="Username Required";
		}
		elseif(strlen($_POST["username"]) <= 5){
			$hasError = true;
			$err_username="Username must contain at least 6 character";
		}
        elseif(strpos($_POST["username"], ' ') !== false){
            $err_username= "Space found in username, Space is not allowed";
        }
		else{
			$username = $_POST["username"];
		}
        if(empty($_POST["password"])){
			$hasError = true;
			$err_password="Password Required";
		}
		elseif(strlen($_POST["password"]) <= 7){
			$hasError = true;
			$err_password="Password must contain at least 8 character";   
		}
		elseif(strpos($_POST["password"], '#') == false){
            $err_password= "Password must contain at least 8 character,one # character or one ? character";
		}
		else{
			$upper = 0;
			$lower = 0;
			$number = 0;
			$arr = str_split($_POST["password"]);
			foreach($arr as $a){
				if($a >= 'A' && $a <= 'Z')
					$upper++;
				elseif($a >= 'a' && $a <= 'z')
					$lower++;
				elseif ($a >= 0)
					$number++;
			}
			if($upper >= 1 && $lower >= 1 && $number >= 1){
				$password = $_POST["password"];
			}
			else{
				$err_password= "Password must contain at least 8 character, 1 special character(# or ?),1 number and combination of uppercase and lowercase alphabet";
			}
		}	
        if(empty($_POST["confirmpassword"])){
			$hasError = true;
			$err_confirmpassword="confirm password Required";
		}
        else if($_POST["password"] !== $_POST["confirmpassword"]){
            $hasError = true;
			$err_confirmpassword="password and confirm password not match";
        }
        else{
            $confirmpassword=$_POST["confirmpassword"];
        }
        if(empty($_POST["email"])){
			$hasError = true;
			$err_email="email Required";
		}
        else if(strpos($_POST["email"], "@") == false || strpos($_POST["email"], ".") == false){
            $hasError = true;
			$err_email="Email must contain @ character and . character";
        }
        else{
            $email=$_POST["email"];
        }
        if(empty($_POST["phonenumber"]) || empty($_POST["phonenumbercode"])){
			$hasError = true;
			$err_phonenumber="phone number & code Required";
		}
        else if(is_numeric($_POST["phonenumber"]) == false && is_numeric($_POST["phonenumbercode"]) == false){
            $hasError = true;
			$err_phonenumber="phone number & code must contain number";
        }
        else{
            $phonenumber=$_POST["phonenumber"];
			$phonenumbercode=$_POST["phonenumbercode"];
        }
		if(empty($_POST["address"])){
			$hasError = true;
			$err_address="Address Required";
		}
		else{
			$address=$_POST["address"];
		}
		if(empty($_POST["city"]) || empty($_POST["state"])){
			$hasError = true;
			$err_citystate="City and State Required";
		}
		else{
			$city=$_POST["city"];
			$state=$_POST["state"];
		}
		if(empty($_POST["postalzipcode"])){
			$hasError = true;
			$err_postalzipcode="Postal/Zip Code Required";
		}
		else if(is_numeric($_POST["postalzipcode"]) == false){
            $hasError = true;
			$err_postalzipcode="Postal/Zip Code must contain number";
        }
		else{
			$postalzipcode=$_POST["postalzipcode"];
		}
		if(!isset($_POST["Day"]))
        {
            $err_Day= "Date required";
            $hasError = true;
        }
        else
        {
            $Day = $_POST["Day"];
        }
        if(!isset($_POST["Month"]))
        {
            $err_Month= "Month required";
            $hasError = true;
        }
        else
        {
            $Month = $_POST["Month"];
        }
        if(!isset($_POST["Year"]))
        {
            $err_Year= "Year required";
            $hasError = true;
        }
        else
        {
            $Year = $_POST["Year"];
        }
		if(!isset($_POST["gender"])){
			$hasError = true;
			$err_gender="Gender Required";
		}
		else{
			$gender = $_POST["gender"];
		}
		if(!isset($_POST["Hears"])){
			$hasError = true;
			$err_Hears="Select Required";
		}
		else{
			$Hears = $_POST["Hears"];
		}
		if(empty($_POST["bio"])){
			$hasError = true;
			$err_bio = "Bio Required";
		}
		else{
			$bio = $_POST["bio"];
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
					<td align="right">Name: </td>
					<td><input type="text" name="name" value="<?php echo $name; ?>"> </td>
					<td><span> <?php echo $err_name;?> </span></td>
				</tr>
				<tr>
					<td align="right">Username: </td>
					<td><input type="text" name="username" value="<?php echo $username; ?>">  </td>
					<td><span> <?php echo $err_username;?> </span></td>
				</tr>
				<tr>
					<td align="right">Password: </td>
					<td><input type="password" name="password" value="<?php echo $password; ?>">  </td>
					<td><span> <?php echo $err_password;?> </span></td>
				</tr>
                <tr>
					<td align="right">Confirm Password: </td>
					<td><input type="password" name="confirmpassword"value="<?php echo $confirmpassword; ?>">  </td>
					<td><span> <?php echo $err_confirmpassword;?> </span></td>
				</tr>
                <tr>
					<td align="right">Email: </td>
					<td><input type="text" name="email" value="<?php echo $email; ?>"> </td>
					<td><span> <?php echo $err_email;?> </span></td>
				</tr>
                <tr>
					<td align="right">Phone Number: </td>
					<td><input style="width: 50px" type="text" placeholder="code" name="phonenumbercode" value="<?php echo $phonenumbercode; ?>"> - <input placeholder="Number" style="width:114px" type="text" name="phonenumber" value="<?php echo $phonenumber; ?>"></td>
					<td><span> <?php echo $err_phonenumber;?> </span></td>
				</tr>
				<tr>
					<td align="right">Address: </td>
					<td><input type="text" name="address" placeholder="Street Address" value="<?php echo $address; ?>"></td>
					<td><span> <?php echo $err_address;?> </span></td>
				</tr>
				<tr>
					<td></td>
					<td> <input style="width: 65px" type="text" name="city" placeholder="City" value="<?php echo $city; ?>"> - <input style="width:100px" type="text" name="state" placeholder="State" value="<?php echo $state; ?>"></td>
					<td><span> <?php echo $err_citystate;?> </span></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="text" name="postalzipcode" placeholder="Postal/Zip Code" value="<?php echo $postalzipcode; ?>"></td>
					<td><span> <?php echo $err_postalzipcode;?> </span></td>
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
                            for($y=1998;$y<=2021;$y++)
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
					<td><input type="radio" value="Male" <?php if($gender=="Male") echo "checked"; ?> name="gender"> Male <input name="gender" <?php if($gender=="Female") echo "checked"; ?> value="Female" type="radio"> Female </td>
					<td><span> <?php echo $err_gender;?> </span></td>
				</tr>
				<tr>
					<td align="right">Where did you hear <br>about us?</td>
					<td><input type="checkbox" value="A Friend or Colleague" <?php if(HearExist("A Friend or Colleague")) echo "checked";?> name="Hears[]">A Friend or Colleague<br>
						<input type="checkbox" value="Google" <?php if(HearExist("Google")) echo "checked";?> name="Hears[]">Google<br>
					    <input type="checkbox" value="Blog Post" <?php if(HearExist("Blog Post")) echo "checked";?> name="Hears[]">Blog Post<br>
						<input type="checkbox" value="News Article" <?php if(HearExist("News Article")) echo "checked";?> name="Hears[]">News Article<br>
						<span><?php echo $err_Hears;?></span></td>
				</tr>
				<tr>
					<td align="right">Bio: </td>
					<td><textarea name="bio" ><?php echo $bio; ?></textarea>
					<td><span> <?php echo $err_bio;?> </span></td>
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