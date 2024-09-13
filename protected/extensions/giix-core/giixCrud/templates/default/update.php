<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs = array(
	'$label' => array('index'),
	Yii::t('app', 'Actualizar'),
);\n";
?>

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' <?php echo $this->modelClass; ?>', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>

<h1><?php echo '<?php'; ?> echo Yii::t('app', 'Actualizar'); <?php echo '?>'; ?> <?php echo $this->modelClass . " #<?php echo GxHtml::encode(GxHtml::valueEx(\$model)); ?>"; ?></h1>

<?php echo "<?php\n"; ?>
$this->renderPartial('_form', array(
		'model' => $model));
?>