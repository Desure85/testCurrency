<div class="webhookTrap-default-index">
    <?php
    echo \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            'id',
            'created_at:date',
            [
                'attribute' => 'body',
                'format' => 'raw',
                'value' => static function ($model) {
                    return '<pre>' . urldecode($model->body) . '</pre>';
                }
            ],
            [
                'class' => \yii\grid\ActionColumn::class,
                'template' => '{view-log}',
            ]
        ]
    ])
    ?>
</div>
