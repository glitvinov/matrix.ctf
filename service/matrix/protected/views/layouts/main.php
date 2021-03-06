<?php /* @var $this Controller */
/* @var $content */?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
    <style>
        /*basic reset */
        *{
            margin: 0;
            padding: 0;
            box-sizing: unset;
        }

        /* Page settings */
        html {
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, #fff 0%, #aaa 100%) no-repeat;
            overflow-x: hidden;
        }
        body {
            text-align: center;
            display: table;
            background: black;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
        }

        canvas {display:block;}

        #author {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color : #0F0;
            z-index : 1;
            box-sizing: border-box;
            vertical-align: middle;
        }

        @keyframes cursor {
            0% {
                opacity: 0;
            }
            40% {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

    </style>
</head>

<body>

<canvas id="c" style="position: fixed; top: 0px; left: 0px; z-index: 10;"></canvas>

<div class="container" style="position: relative; z-index: 11; background: rgba(0, 0, 0, 0.9); margin-top: 20px; color: #969696;">
    <div class="navbar-brand" style="float: left; margin-left: 20px">
        <h1><a href="index.php" class="brand" style="text-decoration: none; color: #969696">Matrix</a></h1>
    </div>
    <?php
    $inside = Users::checkAuth();
    $id = Users::myId();
    $nick = Users::myNick();
    ?>
    <?= (!$inside)? '<div style="display: inline; float: right;"><h4><a href="index.php?r=site/registration">
<input type="button" value="Registration" class="btn btn-success" style="margin: 10px; color:black;"></a></h4></div>':'' ?>
    <?= (!$inside)? '<div style="display: inline; float: right;"><h4><a href="index.php?r=site/login">
<input type="button" value="Login" class="btn btn-success" style="margin: 10px; color:black;"></a></h4></div>':'' ?>
    <?= ($inside)? '<div style="display: inline; float: right;"><h4><a href="index.php?r=site/exit">
<input type="button" value="Exit" class="btn btn-success" style="margin: 10px; color:black;"></a></h4></div>':'' ?>
    <?= ($inside)? '<div style="display: inline; float: right;"><h4><a href="index.php?r=site/profile">
<input type="button" value="Profile ('.$nick.')" class="btn btn-success" style="margin: 10px; color:black;"></a></h4></div>':'' ?>
    <?= '<div style="display: inline; float: right;"><h4><a href="index.php?r=site/index">
<input type="button" value="Main" class="btn btn-success" style="margin: 10px; color:black;"></a></h4></div>' ?>
</div>

<div class="container" id="page" style="position: relative; z-index: 11;">

    <div style="background: rgba(0, 0, 0, 0.8); color: #969696" >
    <?php echo $content; ?>
    </div>

</div><!-- page -->



<script>
    // geting canvas by id c
    var c = document.getElementById("c");
    var ctx = c.getContext("2d");

    //making the canvas full screen
    c.height = window.innerHeight;
    c.width = window.innerWidth;

    //chinese characters - taken from the unicode charset
    var matrix = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789@#$%^&*()*&^%";
    //converting the string into an array of single characters
    matrix = matrix.split("");

    var font_size = 10;
    var columns = c.width / font_size; //number of columns for the rain
    //an array of drops - one per column
    var drops = [];
    //x below is the x coordinate
    //1 = y co-ordinate of the drop(same for every drop initially)
    for(var x = 0; x < columns; x++)
        drops[x] = 1;
    //drawing the characters
    function draw()
    {
        //Black BG for the canvas
        //translucent BG to show trail
        ctx.fillStyle = "rgba(0, 0, 0, 0.04)";
        ctx.fillRect(0, 0, c.width, c.height);
        ctx.fillStyle = "#0F0"; //green text
        ctx.font = font_size + "px arial";
        //looping over drops
        for( var i = 0; i < drops.length; i++ )
        {
            //a random chinese character to print
            var text = matrix[ Math.floor( Math.random() * matrix.length ) ];
            //x = i*font_size, y = value of drops[i]*font_size
            ctx.fillText(text, i * font_size, drops[i] * font_size);

            //sending the drop back to the top randomly after it has crossed the screen
            //adding a randomness to the reset to make the drops scattered on the Y axis
            if( drops[i] * font_size > c.height && Math.random() > 0.975 )
                drops[i] = 0;

            //incrementing Y coordinate
            drops[i]++;
        }
    }

    setInterval( draw, 35 );

</script>

</body>
</html>
