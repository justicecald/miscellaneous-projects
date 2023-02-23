<!DOCTYPE html>
<head><title>Justice Calderón MD5 Cracker</title></head>
<body>
<h1>Justice's MD5 cracker</h1>
<!--Updating description of the application-->
<p>This application takes an MD5 hash and
attempts to hash all 4-digit combinations
to determine the original two characters.</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This loop is going to generate the pins that we'd like to check
    $show = 14;
    for ($i=0; $i<=9; $i++){
        for ($j=0; $j<=9; $j++){
            for ($k=0; $k<=9; $k++){
                for ($l=0; $l<=9; $l++){
                    $txt = "$i"."$j"."$k"."$l";
                    
                    $try = $txt;
                    $check = hash('md5', $try);
                    if ($show >= 0) {
                        echo "$check $try\n";
                        $show = $show-1;
                    }
                    if ($check == $md5){
                        $goodtext = $try;
                        break;
                        
                    }
                }
            }
        }
    }
    /* This code needed to be fixed to make sure that the number of prints is 15*/
    
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>PIN: <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
<li><a
href="https://github.com/csev/wa4e/tree/master/code/crack"
target="_blank">Source code for this application</a></li>
</ul>
</body>
</html>
