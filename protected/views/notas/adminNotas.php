<style>
    .observacion-reprobado {
        color: red;
    }
    .observacion-aprobado {
        color: black;
    }
    .btn-grande {
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: #FF6F00FF;
        color: white;
        cursor: pointer;
    }
    .btn-grande:hover {
        background-color: #0056b3;
    }
</style>

<h1>CURSO: <?php echo htmlspecialchars($resultado[0]['cur_nombre']); ?></h1>
<h1>Participantes del curso</h1>

<!-- Formulario para actualizar notas -->
<form method="post" action="<?php echo Yii::app()->createUrl('notas/updateMultiple'); ?>">
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr>
                <th style="border: 1px solid #dddddd; padding: 8px;">Nombre</th>
                <th style="border: 1px solid #dddddd; padding: 8px;">Apellido</th>
                <th style="border: 1px solid #dddddd; padding: 8px;">Cédula</th>
                <th style="border: 1px solid #dddddd; padding: 8px;">Nota 1</th>
                <th style="border: 1px solid #dddddd; padding: 8px;">Nota 2</th>
                <th style="border: 1px solid #dddddd; padding: 8px;">Nota Final</th>
                <th style="border: 1px solid #dddddd; padding: 8px;">Observación</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $index => $curso): ?>
                <tr>
                    <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo htmlspecialchars($curso['par_nombre_participante']); ?></td>
                    <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo htmlspecialchars($curso['par_apellido_participante']); ?></td>
                    <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo htmlspecialchars($curso['par_cedula_participante']); ?></td>

                    <!-- Campos para editar las notas -->
                    <td style="border: 1px solid #dddddd; padding: 8px;">
                        <input type="number" name="Notas[<?php echo $index; ?>][not_nota1]" value="<?php echo htmlspecialchars($curso['not_nota1']); ?>" min="1" max="20">
                    </td>
                    <td style="border: 1px solid #dddddd; padding: 8px;">
                        <input type="number" name="Notas[<?php echo $index; ?>][not_nota2]" value="<?php echo htmlspecialchars($curso['not_nota2']); ?>" min="1" max="20">
                    </td>
                    <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo htmlspecialchars($curso['not_final']); ?></td>

                    <td style="border: 1px solid #dddddd; padding: 8px; <?php echo ($curso['not_observacion'] === 'Reprobado') ? 'class="observacion-reprobado"' : 'class="observacion-aprobado"'; ?>">
                        <?php echo htmlspecialchars($curso['not_observacion']); ?>
                    </td>

                    <!-- Campo oculto para el código de la nota -->
                    <input type="hidden" name="Notas[<?php echo $index; ?>][not_codigo]" value="<?php echo htmlspecialchars($curso['not_codigo']); ?>">
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Botón para guardar -->
    <button type="submit" class="btn-grande">Guardar</button>
</form>
