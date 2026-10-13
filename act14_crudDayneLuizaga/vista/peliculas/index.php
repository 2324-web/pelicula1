<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Películas</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>

<div class="contenedor">

    <div class="encabezado">
        <h1>Gestión de Películas</h1>
        <button type="button" class="btn btn-nuevo" onclick="abrirModal()">
            + Nueva película
        </button>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Género</th>
                <th>Duración</th>
                <th>Imagen de portada</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php if (empty($peliculas)): ?>
                <tr>
                    <td colspan="6" class="sin-productos">
                        No existen películas registradas.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($peliculas as $pelicula): ?>
                    <tr>
                        <td><?= $pelicula->getId() ?></td>

                        <td>
                            <?= htmlspecialchars($pelicula->getNombre()) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($pelicula->getGenero()) ?>
                        </td>

                        <td>
                            <?= $pelicula->getDuracion() ?> min
                        </td>

                        <td>
                            <?= htmlspecialchars($pelicula->getImagenportada()) ?>
                        </td>

                        <td>
                            <a href="index.php?accion=editar&id=<?= $pelicula->getId() ?>"
                               class="btn btn-editar">
                                Editar
                            </a>

                            <a href="index.php?accion=eliminar&id=<?= $pelicula->getId() ?>"
                               class="btn btn-eliminar"
                               onclick="return confirm('¿Está seguro de eliminar esta película?');">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- =====================================================
     VENTANA MODAL: NUEVA PELÍCULA
     ===================================================== -->
<div id="modalPelicula" class="modal">

    <div class="modal-contenido">

        <div class="modal-encabezado">
            <h2>Nueva película</h2>

            <button type="button" class="cerrar" onclick="cerrarModal()">
                &times;
            </button>
        </div>

        <form method="POST" action="index.php?accion=guardar">

            <label for="nombre">Nombre:</label>
            <input type="text"
                   id="nombre"
                   name="nombre"
                   required
                   placeholder="Ingrese el nombre de la película">

            <label for="genero">Género:</label>
            <input type="text"
                   id="genero"
                   name="genero"
                   required
                   placeholder="Ingrese el género">

            <label for="duracion">Duración:</label>
            <input type="number"
                   id="duracion"
                   name="duracion"
                   min="0"
                   required
                   placeholder="Ingrese la duración">

            <label for="imagenportada">Imagen de portada:</label>
            <input type="text"
                   id="imagenportada"
                   name="imagenportada"
                   required
                   placeholder="Ejemplo: avengers.jpg">

            <div class="acciones-formulario">

                <button type="button"
                        class="btn btn-cancelar"
                        onclick="cerrarModal()">
                    Cancelar
                </button>

                <button type="submit" class="btn btn-guardar">
                    Guardar película
                </button>

            </div>

        </form>
    </div>
</div>

<script>
    // Abrir la ventana modal
    function abrirModal() {
        document.getElementById("modalPelicula").style.display = "flex";
        document.getElementById("nombre").focus();
    }

    // Cerrar la ventana modal
    function cerrarModal() {
        document.getElementById("modalPelicula").style.display = "none";
    }

    // Cerrar al hacer clic fuera del contenido
    window.onclick = function(event) {
        const modal = document.getElementById("modalPelicula");

        if (event.target === modal) {
            cerrarModal();
        }
    };
</script>

</body>
</html>