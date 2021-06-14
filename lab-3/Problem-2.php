<html>
	<head></head>
	<body>
		<?php
			$marks = 90;	    
            if($marks >=90)
			{
				echo " Grade is A+";
			}
			elseif ($marks >"80 and <90")
			{
				echo "Grade is A ";
			}
			elseif ($marks >"70 and <80")
			{
				echo "Grade is B";
			}
			elseif ($marks >"60 and <70")
			{
				echo "Grade is C ";
			}
			else  
			{
				echo "Grade is F ";
			}
		?>
  </body>
</html>