<?php use yii\helpers\Html; ?>
<div class="pull-right btn-group">
	<?php echo Html::a('Обновить', array('site/update', 'id' => $post->id), array('class' => 'btn btn-primary')); ?>
	<?php echo Html::a('Удалить', array('site/delete', 'id' => $post->id), array('class' => 'btn btn-danger')); ?>
</div>

<h1><?php echo Html::encode($post->title); ?></h1>
<p><?php echo Html::encode($post->authors); ?></p>
<p><?php echo Html::encode($post->published); ?></p>
<hr />
<time>Created On: <?php echo Html::encode($post->created); ?></time><br />
<time>Updated On: <?php echo Html::encode($post->updated); ?></time>