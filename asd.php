<?php
/*session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pe6p";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
$user=$_SESSION['idusername'];
echo $user;
$sql = "SELECT * FROM usuarios WHERE id='$user'";
$result= $conn->query($sql);
if ($result->num_rows > 0) {
 $row = $result->fetch_assoc();
 $name=$row['name'];
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PE6°P</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
</head>
<body>
  <div class="sidebar">
    <div class="sidebar-collapse sidepad collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav nav-list" role="tablist" id="accordion">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">INICIO</a></li>
          <li role="presentation"><a href="#operaciones" aria-controls="operaciones" role="tab" data-toggle="tab">OPERACIONES SIMPLES</a></li>
          <li role="presentation"><a href="#problemas" aria-controls="problemas" role="tab" data-toggle="tab">PROBLEMAS MATEMATICOS</a></li>
           <li role="presentation"><a href="logout.php">CERRAR SESION</a></li>
          <!--<li role="presentation"><a href="#bina" aria-controls="bina" role="tab" data-toggle="tab">TRINOMIO ax<sup>2</sup>+bx+c=0</a></li>-->
        </ul>
    </div>
  </div>
<div class="container-fluid">
  <div class="main-container">
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
        <div class="inicial">
          <div class="titles">
            <h1>Bienvenido <?php if(isset($name)){echo $name;}?></h1>
          </div>
          <div class="paragraph">
            <p>Esta es una plataforma educativa para que practiques y mejores tus habilidades para reoslver las operaciones aritméticas basicas.</p>

            <?php
              $user = $_SESSION['idusername'];
              $sql2 = "SELECT * FROM progress WHERE iduser='$user'";
              $result2= $conn->query($sql2);
              if ($result2->num_rows > 0):
                  echo " <p> Estas son tus estadisticas actuales</p>";
                while ($row2= $result2->fetch_assoc()):
            ?>
            <table>
              <tr>
                <td>Cuestionario</td>
                <td>Veces realizado</td>
                <td>Pomedio</td>
              </tr>
              <tr>
                <td>Operaciones Simples<br>Nivel 1</td>
                <td><?php echo $row2['simopeasyt'];?></td>
                <td><?php
                      if ($row2['simopeasyt'] == 0) {
                         echo "0";
                       }
                       else{
                        echo $row2['simopeasyprom']/$row2['simopeasyt'];
                        }?></td>
              </tr>
              <tr>
                <td>Operaciones Simples<br>Nivel 2</td>
                <td><?php echo $row2['simopnormalt'];?></td>
                <td><?php
                      if ($row2['simopnormalt']==0) {
                        echo "0";
                      }
                      else{
                        echo $row2['simopnormalprom']/$row2['simopnormalt'];
                      }?></td>
              </tr>
              <tr>
                <td>Operaciones Simples<br>Nivel 3</td>
                <td><?php echo $row2['simophardt'];?></td>
                <td><?php
                      if ($row2['simophardt']==0) {
                         echo "0";
                       }
                       else{
                        echo $row2['simophardprom']/$row2['simophardt'];
                        }?></</td>
              </tr>
              <tr>
                <td>Problemas Matemáticos</td>
                <td><?php echo $row2['problemstimes'];?></</td>
                <td><?php
                      if ($row2['problemstimes'] == 0) {
                        echo "0";
                      }
                      else{
                        echo $row2['problemsprom']/$row2['problemstimes'];
                      }?></</td>
              </tr>
            </table>
            <?php endwhile;?>
          <?php endif; ?>

          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="operaciones">
        <div class="def_selec">
          <div class="titles">
            <h1>OPERACIONES ARITMETICAS</h1>
          </div>
          <div class="paragraph">
            <p>Realizaras operaciones ariméticas simples. No uses caculadora, ya que estan pensadas para que ejercites tus habilidades para resolverlas.</p>
          </div>
          <form action="simple_op.php" method="POST">
          <div class="button_position">
            <center><button class="submit" type="number" name="dif" value="1"> NIVEL 1 </button></center><br>
            <center><button calss="submit" type="number" name="dif" value="2"> NIVEL 2 </button></center><br>
            <center><button class="submit" type="number" name="dif" value="3"> NIVEL 3 </button></center><br>
          </div>
          </form>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="problemas">
        <div class="def_selec">
          <div class="titles">
            <h1>PROBLEMAS MATEMATICOS</h1>
          </div>
          <div class="paragraph">
            <p>Se te presentaran 5 problemas matemáticos para que los resulevas. Puedes hacer uso de lapiz y papel para realizar lass operaciones que necesites. Recuerda que si tu resultado tiene decimales, solo escribas 2 de ellas en la casilla de tu respuesta.</p>
          </div>
          <form action="problemas.php" method="POST">
            <div class="button_position">
            <center><button class="submit" type="number" name="dif"> INICIAR</button></center><br>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="footer">
  PLATAFORMA EDUCATIVA 6° PRIMARIA ©  Isaac B.E.R
</div>


</body>
</html>
