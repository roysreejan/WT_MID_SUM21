<html>
	<head></head>
	<body>
		<?php
			$length = 10;
			$width = 10;
			$Area = $length*$width;
			$Perimeter = 2*($length+$width);
			$Square = $length*$length;
			
			if ($length==$width)
			{
				echo "The shape is a square";
			} 
			else 
			{
				echo "Area of rectangle is $Area <br>" ; 
				echo "Perimeter of rectangle is $Perimeter <br>" ;
			}	
		?>
	</body>
</html>