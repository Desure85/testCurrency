<div class="webhookTrap-default-index">
    <?php
    echo \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            'id',
            'name',
            'uri',
            'created_at:date',
            'updated_at:date',
            [
                'class' => \yii\grid\ActionColumn::class,
                'template' => '{view} {update} {delete}',
                'header' => \yii\helpers\Html::a('create', ['create'], ['class' => 'btn btn-success'])
            ]
        ]
    ])
    ?>
</div>
