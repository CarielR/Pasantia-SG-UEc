<style>
    .btn-grande {
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: #FF6F00;
        color: white;
        cursor: pointer;
    }
    .btn-grande:hover {
        background-color: #E65C00;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        border: 1px solid #dddddd;
        padding: 8px;
    }
</style>
<?php
// Verificamos si se ha enviado el parámetro de curso y la fecha
$cur_codigo = isset($cur_codigo) ? $cur_codigo : null;
$fecha = isset($fecha) ? $fecha : date('Y-m-d'); // Fecha por defecto actual
?>

<h1>Asistencia del curso </h1>

<!-- Campo para seleccionar la fecha -->
<div>
    <label for="fecha">Fecha:</label>
    <?php echo CHtml::form(); ?>
    <?php echo CHtml::textField('fecha', $fecha, array('id' => 'fecha', 'class' => 'fecha-input')); ?>
    <?php echo CHtml::submitButton('Ver asistencia', array('name' => 'consultar', 'class' => 'btn-consultar')); ?>
    <?php echo CHtml::endForm(); ?>
</div>

<hr>

<?php if ($asistencia_existe): ?>
    <!-- Mostrar tabla de asistencia si existen registros -->
    <h3>Registros de asistencia:</h3>
    <form method="post">
        <table border="1">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Asistencia</th>
                    <th>Observación</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $registro): ?>
                    <tr>
                        <td><?php echo CHtml::encode($registro['par_cedula_participante']); ?></td>
                        <td><?php echo CHtml::encode($registro['par_nombre_participante']); ?></td>
                        <td><?php echo CHtml::encode($registro['par_apellido_participante']); ?></td>
                        <td>
                            <input type="checkbox" name="Asistencia[<?php echo $registro['par_codigo']; ?>][asi_asistencia]" 
                                   value="1" <?php echo (isset($registro['asi_asistencia']) && $registro['asi_asistencia'] == 1) ? 'checked' : ''; ?> />
                        </td>
                        <td>
                            <input type="text" name="Asistencia[<?php echo $registro['par_codigo']; ?>][asi_observacion]" 
                                   value="<?php echo isset($registro['asi_observacion']) ? CHtml::encode($registro['asi_observacion']) : ''; ?>" />
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <input type="submit" name="guardar" value="Guardar asistencia" class="btn-guardar" />
    </form>
<?php else: ?>
    <!-- Si no hay registros, mostrar mensaje y botón de generar asistencia -->
    <p>No existen registros de asistencia para la fecha seleccionada.</p>
    <form method="post">
        <input type="hidden" name="fecha" value="<?php echo CHtml::encode($fecha); ?>" />
        <input type="submit" name="generar" value="Generar asistencia" class="btn-generar" />
    </form>
<?php endif; ?>
