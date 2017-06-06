<?php 
use yii\helpers\Html; 
use yii\widgets\ActiveForm;
//use yii\jui\DatePicker;
?>

<?php     

$form = ActiveForm::begin([
    'id' => 'ride-form',
    'enableClientValidation'=>false,
    'validateOnSubmit' => true,
	'class' => 'form-horizontal',
]);

?>
	<?php echo $form->field($model, 'title')->textInput(array('class' => 'span8')); ?>
	<?php echo $form->field($model, 'authors')->textArea(array('class' => 'span8')); ?>
    <?php echo $form->field($model, 'published')->textInput(array('class' => 'span8'));
	/*echo $form->field($model, 'published')->widget(DatePicker::classname(), [
    'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
	])*/
	?>
	<div class="form-actions">
		<?php echo Html::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>
    
<?php ActiveForm::end(); ?>