<div class="webhookTrap-default-index">
    <?php
    echo \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            'id',
            'created_at:date',
            'body',
            [
                'class' => \yii\grid\ActionColumn::class,
                'template' => '{view-log}',
            ]
        ]
    ])
    ?>
</div>
