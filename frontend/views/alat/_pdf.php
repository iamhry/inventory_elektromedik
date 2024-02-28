<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id_alat',
        'nama_alat',
        'no_seri',
        'type_alat',
        'spesifikasi_alat',
        'model_alat',
        'foto',
    ],
]) ?>
<?php
echo Html::img(Yii::$app->request->baseUrl . '/uploads/' . $model->foto,
    ['width' => '200px']);?>