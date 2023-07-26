<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada_salida</title>
</head>
<body>
    <h2>Entrada_salida</h2>

    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Fecha de entrada</th>
                <th>Fecha de Salida</th>
                <th>ID producto</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($entrada_salida!=false) {
                    $contador = 0;
                    foreach ($entrada_salida->result() as $entrada_salida) {
                        ?>
                        <tr>
                            <td><?= ++$contador ?></td>
                            <td><?= $entrada_salida->Fecha_entrada ?></td>
                            <td><?= $entrada_salida->Fecha_salida ?></td>
                            <td><?= $entrada_salida->IdProducto ?></td>
                            <td>
                                <a href="<?= base_url('index.php/actualizar_entrada_salida/'.$entrada_salida->IdEntrada) ?>">Actualizar</a><br>
                                <a href="<?=base_url('index.php/eliminar_entrada_salida/'.$entrada_salida->IdEntrada) ?>">Eliminar</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </tbody>
    </table>

</body>
</html>