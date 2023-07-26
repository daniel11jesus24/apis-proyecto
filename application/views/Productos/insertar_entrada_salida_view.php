<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar entrada/salida</title>
</head>
<body>
    <form action="insertarEntrada_salida" method="post">
        <label for="">Fecha de entrada</label>
        <input type="datetime-local" name="Fecha_entrada" id="Fecha_entrada" placeholder="Escriba aquí">
        <label for="">Fecha de salida</label>
        <input type="datetime-local" name="Fecha_salida" id="Fecha_salida" placeholder="Escriba aquí">
        <label for="">Id producto</label>
        <input type="num" name="IdProducto" id="IdProducto" min="0">
        <button type="submit">Aceptar</button>
    </form>
</body>
</html>