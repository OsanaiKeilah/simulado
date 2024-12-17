

<?php $__env->startSection('title', 'Simulado - Matemática'); ?>

<?php $__env->startSection('content'); ?>
<div style="background-color: white; padding: 20px; width:100%; height: 565px;">

    <!-- Exibindo as perguntas -->
    <div style="color: #227930; margin-top:40px;text-align: center; font-weight: bold">
        <div id="pergunta" style="font-size: 50px;">Pergunta 1</div>  <!-- Adicionado div para pergunta -->
        </br></br></br>
        <div id="textoPergunta" style="text-align: center; font-size: 30px;">Qual é a capital do Brasil?</div> <!-- Exibindo a pergunta aqui -->
    </div>

    <!-- Formulário para enviar a resposta -->
    <div style="text-align: center; color: #227930; margin-top: 20px;">
        <input type="text" id="resposta" name="resposta" required style="font-size: 20px; padding: 10px; margin-top: 10px; border-radius: 8px; width: 80%; max-width: 500px;">
        </br></br>
        <button type="submit" id="start" style="font-size: 18px; font-weight: 600; background-color: #227930; border-radius: 12px; border: 0; padding: 10px 20px; cursor: pointer; color: white;">Enviar Resposta</button>
    </div>

    <div id="mensagemResposta" style="margin-top: 20px; text-align: center; font-size: 20px;">
    </div>

    <!-- Botão "Ver mais" após o simulado -->
    <div id="finalizacaoSimulado" style="text-align: center; margin-top: 20px; display: none;">
        <button id="verMaisBtn" style="font-size: 18px; font-weight: 600; background-color: #227930; border-radius: 12px; border: 0; padding: 10px 20px; cursor: pointer; color: white;">Ver mais</button>
    </div>

    <!-- Exibição da explicação da IA -->
    <div id="explicacaoIA" style="text-align: center; margin-top: 20px; color:  #227930; display: none; font-size: 18px;">
        <!-- As explicações das respostas serão exibidas aqui -->
    </div>
</div>

<!-- Script para enviar a resposta com AJAX -->
<?php $__env->startSection('scripts'); ?>
<script>
    // Array de perguntas
    const perguntas = [
        { pergunta: "Qual é a capital do Brasil?", respostaCorreta: "Brasília" },
        { pergunta: "Quanto é 5 + 3?", respostaCorreta: "8" },
        { pergunta: "Qual é a raiz quadrada de 16?", respostaCorreta: "4" },
        { pergunta: "Qual é o resultado de 12 x 12?", respostaCorreta: "144" }
    ];

    let perguntaAtual = 0;  // Índice da pergunta atual
    let respostasAluno = [];  // Para armazenar as respostas do aluno

    // Função para mudar a pergunta
   
    // Função para mudar a pergunta
    function exibirProximaPergunta() {
        if (perguntaAtual < perguntas.length) {
            document.getElementById('textoPergunta').textContent = perguntas[perguntaAtual].pergunta;
        } else {
            // Exibe mensagem de simulado concluído
            document.getElementById('textoPergunta').textContent = "Simulado concluído!";
            document.getElementById('finalizacaoSimulado').style.display = "block";  // Exibe o botão "Ver mais"
            
            // Esconde o botão de enviar resposta e o campo de resposta
            document.getElementById('start').style.display = "none";  // Esconde o botão de enviar resposta
            document.getElementById('resposta').style.display = "none";  // Esconde o campo de resposta
        }
    }

    // Submete a resposta
    document.getElementById('start').addEventListener('click', function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        const resposta = document.getElementById('resposta').value;
        const pergunta = perguntas[perguntaAtual];
        let mensagem;
        let correta = resposta.toLowerCase() === pergunta.respostaCorreta.toLowerCase();

        if (correta) {
            mensagem = "Resposta correta! Parabéns!";
            document.getElementById('mensagemResposta').style.color = "#227930";  // Cor verde para resposta correta
        } else {
            mensagem = `Resposta errada! A resposta correta é: ${pergunta.respostaCorreta}.`;
            document.getElementById('mensagemResposta').style.color = "red";  // Cor vermelha para resposta errada
        }

        respostasAluno.push({ pergunta: pergunta.pergunta, respostaAluno: resposta, correta: correta });

        document.getElementById('mensagemResposta').textContent = mensagem;

        // Limpa o campo de resposta
        document.getElementById('resposta').value = '';

        // Envia a resposta para a API de IA para gerar explicação
        fetch("/api/explicar_resposta", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"  // Inclui o CSRF token
            },
            body: JSON.stringify({ resposta: resposta, pergunta: pergunta.pergunta })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('mensagemResposta').textContent += ` Explicação: ${data.explicacao}`;
        })
        .catch(error => {
            console.error('Erro ao enviar para a IA:', error);
        });

        // Avança para a próxima pergunta
        perguntaAtual++;
        exibirProximaPergunta();
    });
    document.getElementById('verMaisBtn').addEventListener('click', function() {
    // Limpa a mensagem de resposta quando o aluno clicar em "Ver mais"
    document.getElementById('mensagemResposta').textContent = '';  // Limpeza da mensagem de resposta

    // Esconde o botão "Ver mais"
    document.getElementById('finalizacaoSimulado').style.display = "none";

    // Exibe as explicações das respostas
    let explicacaoTexto = "Aqui está o feedback das suas respostas:<br><br>";  // Usando <br> para quebra de linha
    
    respostasAluno.forEach(resposta => {
        explicacaoTexto += `Pergunta: ${resposta.pergunta} - Sua Resposta: ${resposta.respostaAluno} - Resultado: ${resposta.correta ? 'Correto' : 'Errado'}<br>`;
    });

    // Aplica os estilos no feedback
    let explicacaoElement = document.getElementById('explicacaoIA');
    explicacaoElement.innerHTML = explicacaoTexto;  // Usando innerHTML para renderizar as quebras de linha
    explicacaoElement.style.display = "block";
    explicacaoElement.style.color = "#227930";  // Definindo a cor do feedback
    explicacaoElement.style.marginTop = "40px";  // Definindo a margem superior
    explicacaoElement.style.textAlign = "center";  // Centralizando o texto
    explicacaoElement.style.fontWeight = "bold";  // Definindo o peso da fonte
});


</script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.appsimulado', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC-01\simulador\resources\views/simulado.blade.php ENDPATH**/ ?>