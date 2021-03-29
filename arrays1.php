<!DOCTYPE html>
<html>

<head>
    <style>

        body
        {
            background-color:#85929e;
        }   
        .button 
        {
            background-color:  #DAF7A6;
            border: none;
            color: #212f3d;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button:hover 
        {
            background-color: #4CAF50;
            color: white;
        }
        .text-input
        {
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            background-color: #DAF7A6 ;
            color: black;
        }
        h1
        {
            color:white;
        }
    </style>
</head>

<body>
<h1 align=center>PHP Stack and Queue</h1>

<form method="post" style=" color:white ; background-color:  #2e4053  ;text-align:center;padding:100px;margin:100px" action="<?php echo $_SERVER['PHP_SELF'];?>">
 
  Element: <input type="text" name="ele" class = "text-input"><br><br>
  <input type="submit" name="StackAdd" value="SAdd" class = "button">
  <input type="submit" name="StackDelete" value="SDelete" class = "button">
  <input type="submit" name="StackDisplay" value="SDisplay" class = "button">
 
  <input type="submit" name="QueueAdd" value="QAdd" class = "button">
  <input type="submit" name="QueueDelete" value="QDelete" class = "button">
  <input type="submit" name="QueueDisplay" value="QDisplay" class = "button">
<br><br>


<?php
$stack = array();
$queue = array();

if(!isset( $_SESSION ) ) {
    session_start();
}
else {
$_SESSION["ss"] = implode(",",$stack);
$_SESSION["q"] = implode(",",$queue);
}

function addS($value) {
	$stack=explode(",",$_SESSION["ss"]);
	array_push($stack,$value);
	$_SESSION["ss"] = implode(",",$stack);
}

function delS() {
    $stack=explode(",",$_SESSION["ss"]);
	array_pop($stack);
	$_SESSION["ss"] = implode(",",$stack);
}

function disS() {
	$stack=explode(",",$_SESSION["ss"]);
	foreach($stack as $value){
		if($value != NULL)
			echo $value . " | ";
	}

}

function addQ($value) {
	$queue=explode(",",$_SESSION["q"]);
	array_push($queue,$value);
	$_SESSION["q"] = implode(",",$queue);
}

function delQ() {
    $queue=explode(",",$_SESSION["q"]);
	array_shift($queue);
	$_SESSION["q"] = implode(",",$queue);
}

function disQ() {
	$queue=explode(",",$_SESSION["q"]);
	foreach($queue as $value){
		if($value != NULL)
			echo $value . " | ";
	}

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $ele = trim($_REQUEST['ele']); 
        if (isset($_POST['StackAdd'])) {
			if (empty($ele)) {
				echo "string is empty";
			} else {
				addS($ele);
			}
		}
		
        if (isset($_POST['StackDelete'])) {
			delS();
		} 

		if (isset($_POST['StackDisplay'])) {
			disS();
		}

        if (isset($_POST['QueueAdd'])) {
			if (empty($ele)) {
				echo "string is empty";
			} else {
				addQ($ele);
			}
		}

        if (isset($_POST['QueueDelete'])) {
			delQ();
		}

        if (isset($_POST['QueueDisplay'])) {
			disQ();
		}
}
?>
</form>
</body>
</html>