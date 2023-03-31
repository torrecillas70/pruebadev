<!DOCTYPE html>
<html>
  <head>
    <title>Sistema de Votación</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
  </head>
  <body>
    <div id="formulario">
      <form id="votacion-form" action="submit.php" method="POST">
          <h3>FORMULARIO DE VOTACIÓN:</h3>
          <label for="nombre">
            <span>Nombre y Apellido</span>
            <input type="text" name="nombre" required>
          </label>
          <label>
              <span>Alias</span>
              <input type="text" name="alias" required>
          </label>
          <label>
              <span>RUT</span>
              <input type="text" name="rut" required>
          </label>
          <label>
              <span>Email</span>
              <input type="text" name="email" required>
          </label>
          <label>
            <span>Región</span>
            <select name="region" required>
              <option value="">Seleccione una opción</option>
              <?php
                $conn = mysqli_connect("localhost", "root", "password", "name_db");
                if (!$conn) {
                  die("Conexión fallida: " . mysqli_connect_error());
                }
                $query = "SELECT * FROM regiones";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                }
                mysqli_close($conn);
              ?>
            </select>
          </label>
          <label>
              <span>Comuna</span>
              <select name="comuna" required>
                <option value="">Seleccione una opción</option>
                <?php
                  $conn = mysqli_connect("localhost", "root", "password", "name_db");
                  if (!$conn) {
                    die("Conexión fallida: " . mysqli_connect_error());
                  }
                  $query = "SELECT * FROM comunas";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                  }
                  mysqli_close($conn);
                ?>
              </select>
          </label>
          <label>
              <span>Candidato</span>
              <select name="region" required>
              <option value="">Seleccione una opción</option>
              <?php
                  $conn = mysqli_connect("localhost", "root", "password", "name_db");
                  if (!$conn) {
                    die("Conexión fallida: " . mysqli_connect_error());
                  }
                  $query = "SELECT * FROM candidatos";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                  }
                  mysqli_close($conn);
                ?>
              </select>
          </label>
          <label>
            <span>Cómo se enteró de nosotros</span>
            <div class="input-box">
              <input type="checkbox" name="entero[]" value="web">
              <label class="label-box" for="web">Web</label>
            </div>
            <div class="input-box">
              <input type="checkbox" name="entero[]" value="tv">
              <label class="label-box" for="tv">TV</label>
            </div>
            <div class="input-box">
              <input type="checkbox" name="entero[]" value="redes_sociales">
              <label class="label-box" for="redes_sociales">Redes Sociales</label>
            </div>
            <div class="input-box">
              <input type="checkbox" name="entero[]" value="amigo">
              <label class="label-box" for="amigo">Amigo</label>
            </div>
          </label>
          <button type="submit">Votar</button>
      </form>
    </div>
  </body>
</html>