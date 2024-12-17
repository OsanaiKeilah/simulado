

<?php $__env->startSection('title', 'Resposta do Simulado'); ?>

<?php $__env->startSection('content'); ?>

    <div style="background-color: #227930; padding: 60px; max-width: 1000px; height: 70vh; margin-top: 10px; margin: 0 auto;">
        <div style="background-color: white; padding: 60px; border-radius: 8px; width: 100%; height: auto; margin: 0 auto;">
        
            <header style="text-align: center; color: #227930; margin-top: 120px;">
                <h1>Resultado da sua Resposta</h1>
            </header>

            <header style="text-align: center; color: #227930; margin-top: 20px;">
                <p><?php echo e($mensagem); ?></p>
            </header>

            <div style="text-align: center; margin-top: 20px;">
                <a href="<?php echo e(route('simulado')); ?>" style="padding: 10px 20px; background-color: #fff; color: #227930; border-radius: 12px; border: none; cursor: pointer; margin-top: 20px;">
                    Voltar ao Simulado
                </a>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC-01\Desktop\Simulador-PHP\simulador\resources\views/resposta.blade.php ENDPATH**/ ?>