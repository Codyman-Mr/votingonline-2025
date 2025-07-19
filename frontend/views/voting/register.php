<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// CSS for background & form
$this->registerCss("
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #000;
        overflow: hidden;
        height: 100vh;
        position: relative;
    }

    .bubbles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        overflow: hidden;
        pointer-events: none;
    }

    .bubbles span {
        position: absolute;
        display: block;
        border-radius: 50%;
        opacity: 0.8;
        animation: floatUp linear infinite;
    }

    @keyframes floatUp {
        0% {
            transform: translateY(0);
            opacity: 0.2;
        }
        50% {
            opacity: 0.8;
        }
        100% {
            transform: translateY(-1000px);
            opacity: 0;
        }
    }

    .register-container {
        background: rgba(255, 255, 255, 0.95);
        max-width: 500px;
        margin: 80px auto;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(255, 255, 255, 0.1);
        position: relative;
        z-index: 2;
        animation: fadeIn 1s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
    }

    .btn-success {
        width: 100%;
        font-size: 16px;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .alert {
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 5px;
        font-size: 14px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }
");

// Bubble colors & generation
$colors = ['#FF1493', '#00FFFF', '#32CD32', '#FFD700', '#FF4500', '#1E90FF', '#DA70D6', '#00FF7F'];
$bubbleCSS = "";
$bubbleCount = 160;

for ($i = 1; $i <= $bubbleCount; $i++) {
    $left = rand(0, 100);
    $delay = rand(0, 20);
    $duration = rand(10, 25);
    $size = rand(5, 12);
    $color = $colors[array_rand($colors)];
    $bubbleCSS .= ".bubbles span:nth-child($i) {
        left: {$left}%;
        bottom: -20px;
        width: {$size}px;
        height: {$size}px;
        background: {$color};
        animation-duration: {$duration}s;
        animation-delay: {$delay}s;
    }";
}
$this->registerCss($bubbleCSS);
?>

<!-- Bubbles background -->
<div class="bubbles">
    <?php for ($i = 0; $i < $bubbleCount; $i++): ?>
        <span></span>
    <?php endfor; ?>
</div>

<!-- Form container -->
<div class="register-container">
    <h1><?= Yii::t('app', Html::encode($this->title)) ?></h1>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger"><?= Yii::t('app', Yii::$app->session->getFlash('error')) ?></div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success"><?= Yii::t('app', Yii::$app->session->getFlash('success')) ?></div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'Full Name')) ?>
    <?= $form->field($model, 'voter_id_number')->textInput(['maxlength' => true])->label(Yii::t('app', 'Voter ID Number')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Register'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
