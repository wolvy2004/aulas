<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Aula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descripcion',
            'ubicacion',
            'cant_pcs',
            'es_climatizada:boolean',
            //'aforo:boolean',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Aula $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
