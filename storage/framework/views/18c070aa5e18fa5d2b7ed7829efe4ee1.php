

<?php $__env->startSection('title', 'Simulado - Matemática'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Início do cabeçalho do AdminLTE3 -->
    <header class="main-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

    </header>

    <!-- Conteúdo principal -->
    <div class="content-wrapper">
        <section class="content" style="padding: 30px;">
            <!-- Texto de boas-vindas -->
            <div style="text-align: center; color: white; margin-top: 80px;">
                <h1>Bem-vindo, aluno!</h1>
            </div>

            <div style="text-align: center; color: white; margin-top: 20px;">
                <p>Clique no botão abaixo para iniciar o teste</p>
            </div>

            <!-- Botão centralizado -->
            <div style="text-align: center; margin-top: 20px;">
                <a href="<?php echo e(route('simulado')); ?>">
                    <button id="start" onClick="cliqueBtn()">INICIAR</button>
                </a>
            </div>
        </section>
    </div>

    <!-- Adicionando o estilo CSS para o botão -->
    <style>
        button {
            font-size: 18px;
            font-weight: 600;
            background-color: white;
            border-radius: 12px;
            border: 0;
            padding: 10px 20px;
            cursor: pointer;
            color: #227930; /* Cor do texto do botão */
        }

        /* Efeito de hover (opcional) */
        button:hover {
            background-color: #f1f1f1; /* Cor de fundo do botão ao passar o mouse */
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC-01\Desktop\Simulador-PHP\simulador\resources\views/home.blade.php ENDPATH**/ ?>