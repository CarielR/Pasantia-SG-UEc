<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs = array(
	'$label' => array('index'),
	Yii::t('app', 'Gestionar'),
);\n";
?>

$this->menu = array(
		array('label'=>Yii::t('app', 'Listar') . ' <?php echo $this->modelClass; ?>',
			'url'=>array('index')),
		array('label'=>Yii::t('app', 'Crear') . ' <?php echo $this->modelClass; ?>',
		'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- <h1><?php echo '<?php'; ?> echo Yii::t('app', 'Gestionar'); ?> <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1> -->

<p style="display:none">
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo "<?php //echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>"; ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search', array(
	'model' => \$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo '<?php'; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider' => $model->search(),
        'itemsCssClass' => 'table',
	'filter' => $model,
	'columns' => array(
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
	if (++$count == 7)
		echo "\t\t/*\n";
	echo "\t\t" . $this->generateGridViewColumn($this->modelClass, $column).",\n";
}
if ($count >= 7)
	echo "\t\t*/\n";
?>
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>