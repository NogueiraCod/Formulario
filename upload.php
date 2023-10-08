<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "uploads/";
    
    // Verifica se o diretório de upload existe, senão cria
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $imagem = $_FILES["imagem"];
    $pdf = $_FILES["pdf"];

    // Verifica se foram selecionados arquivos
    if ($imagem["error"] == 0 && $pdf["error"] == 0) {
        $imagemName = $uploadDir . basename($imagem["name"]);
        $pdfName = $uploadDir . basename($pdf["name"]);

        // Move os arquivos para o diretório de upload
        if (move_uploaded_file($imagem["tmp_name"], $imagemName) && move_uploaded_file($pdf["tmp_name"], $pdfName)) {
            echo "Arquivos enviados com sucesso!";
        } else {
            echo "Erro ao enviar os arquivos.";
        }
    } else {
        echo "Erro no envio dos arquivos.";
    }
}
?>