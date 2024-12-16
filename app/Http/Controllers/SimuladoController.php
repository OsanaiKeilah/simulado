<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SimuladoController extends Controller
{
    public function mostrarSimulado()
    {
        return view('simulado');
    }
    public function verificarResposta(Request $request)
    {
        $resposta = $request->input('resposta');
        $pergunta = $request->input('pergunta');

        $apiKey = "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"; 
        $modelo = 'gpt-3.5-turbo'; 

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$apiKey}",
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => $modelo,
            'messages' => [
                ['role' => 'system', 'content' => 'Você é um assistente de simulado que diz se a resposta está correta ou errada e explica como resolver.'],
                ['role' => 'user', 'content' => "A resposta do aluno para a pergunta '{$pergunta}' foi: {$resposta}. Está correta?"],
            ],
            'max_tokens' => 100,
        ]);

        $data = $response->json();
        
        $mensagem = $data['choices'][0]['message']['content'] ?? 'Não foi possível processar a resposta';

        
        return response()->json(['mensagem' => $mensagem]);    }

    public function mostrarResposta(Request $request)
    {
        $mensagem = $request->input('mensagem', 'Sem resposta');

        return view('resposta', compact('mensagem'));
    }

    public function enviarDuvida(Request $request)
    {
        $doubt = $request->input('doubt');
        $respostas = $request->input('respostas');
    
        $apiKey = "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"; 
        $modelo = 'gpt-3.5-turbo';
    
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$apiKey}",
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => $modelo,
            'messages' => [
                ['role' => 'system', 'content' => 'Você é um assistente que responde dúvidas diretamente de alunos sobre simulados e leva em conta as respostas que eles já deram.'],
                ['role' => 'user', 'content' => "Aqui estão as respostas do aluno: {$respostas}. A dúvida dele é: {$doubt}."],
            ],
            'max_tokens' => 300,
        ]);
    
        $data = $response->json();
        $resposta = $data['choices'][0]['message']['content'] ?? 'Não foi possível processar sua dúvida.';
    
        return response()->json(['resposta' => $resposta]);
    }


    public function mostrarDuvidas(Request $request)
    {
        $respostas = $request->input('respostas'); // Captura o parâmetro 'respostas' da URL
        $respostasDecodificadas = $respostas ? json_decode($respostas, true) : []; // Decodifica o JSON em um array PHP
    
        // Verificação para logs
        if (empty($respostasDecodificadas)) {
            logger('Nenhuma resposta foi recebida ou não foi possível decodificar as respostas.');
        }
    
        return view('duvidas', compact('respostas')); // Envia as respostas para a view
    }
}
