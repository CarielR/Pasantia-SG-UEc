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
        background-color: #FF6F00; /* Fondo anaranjado */
        color: white; /* Letras blancas */
        cursor: pointer;
    }
    .btn-grande:hover {
        background-color: #E65C00; /* Fondo anaranjado más oscuro al hacer hover */
    }
</style>

<?php $form = $this->beginWidget('GxActiveForm', array(
    'id' => 'notas-form',
    'enableAjaxValidation' => false,
    'action' => Yii::app()->createUrl('notas/update', array('id' => $resultado[0]['cur_codigo'])),
)); ?>

<h1>CURSO: <?php echo htmlspecialchars($resultado[0]['cur_nombre']); ?></h1>
<h1>Participantes del curso</h1>

<!-- Formulario para actualizar notas -->
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
                <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo htmlspecialchars($curso['not_nota1']); ?></td>
                <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo htmlspecialchars($curso['not_nota2']); ?></td>
                <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo htmlspecialchars($curso['not_final']); ?></td>
                <td style="border: 1px solid #dddddd; padding: 8px;" class="<?php echo ($curso['not_observacion'] === 'Reprobado') ? 'observacion-reprobado' : 'observacion-aprobado'; ?>">
                    <?php echo htmlspecialchars($curso['not_observacion']); ?>
                </td>

                <!-- Campo oculto para el código de la nota -->
                <input type="hidden" name="Notas[<?php echo $index; ?>][not_codigo]" value="<?php echo htmlspecialchars($curso['not_codigo']); ?>">
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Botón para modificar notas -->
<button type="submit" class="btn-grande">Modificar Notas</button>

<?php $this->endWidget(); ?>
