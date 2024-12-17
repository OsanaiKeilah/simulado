<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Minha Aplicação Laravel'); ?></title>
    <link rel="shortcut icon" href="/images/icone.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo básico do menu */
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            background-color: #227930;
            align-items: center; /* Alinha verticalmente o logo e os links */
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 15px;
            display: block;
        }

        nav ul li a:hover {
            background-color: #575757;
        }

        /* Adicionando um pouco de estilo ao corpo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 140px;
            background-color: #227930; /* Fundo verde */
            padding: 40px; /* Aumenta o espaçamento interno */
            border-radius: 8px; /* Bordas arredondadas */
            width: 80%; /* Largura maior (ajustada para 95%) */
            height: 650px; /* Limite máximo de largura mais largo */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }
        /* Estilo para o logo */
        .logo {
            margin-right: 20px;
        }

        .logo img {
            height: 40px; /* Ajuste o tamanho do logo conforme necessário */
        }

        /* Estilo adicional */
        #finalizacaoSimulado {
            margin-top: 20px;
            text-align: center;
            display: none;
        }

        #explicacaoIA {
            margin-top: 20px;
            color: white;
            text-align: center;
            display: none;
        }

        #mensagemResposta {
            margin-top: 20px;
            text-align: center;
            color: white;
        }

    </style>
</head>
<body>

    <!-- Menu horizontal -->
    <nav>
        <ul>
            <!-- Logo do IFSP -->
            <li class="logo">
                <a href="<?php echo e(route('home')); ?>">
                    <img src="/images/logo.ifsp.png" alt="Logo IFSP">
                </a>
            </li>
            <li><a href="<?php echo e(route('home')); ?>">HOME</a></li>

            <!-- Você pode adicionar mais itens aqui -->
        </ul>
    </nav>

    <div class="container">
        <!-- O conteúdo de cada página será inserido aqui -->
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\Users\PC-01\Desktop\Simulador-PHP\simulador\resources\views/layouts/appsimulado.blade.php ENDPATH**/ ?>