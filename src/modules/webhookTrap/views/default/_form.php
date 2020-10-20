<?php

$form = \yii\widgets\ActiveForm::begin();
echo $form->field($model, 'name')->textInput();
echo $form->field($model, 'uri')->textInput();
echo $form->field($model, 'description')->textarea();
?>
    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php
\yii\widgets\ActiveForm::end();
