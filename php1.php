<?php
// Definindo as credenciais de acesso ao banco de dados
$servername = "localhost";
$username = "root"; // seu usuário do MySQL
$password = ""; // sua senha do MySQL
$dbname = "mysql1"; // nome do banco de dados

// Criando conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificando se a conexão foi bem-sucedida
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Exemplo de uma consulta simples
$sql = "SELECT id, nome FROM usuarios";
$result = mysqli_query($conn, $sql);

// Verificando se há resultados e exibindo-os
if (mysqli_num_rows($result) > 0) {
    // Saída de cada linha
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"] . " - Nome: " . $row["nome"] . "<br>";
    }
} else {
    echo "0 resultados";
}

// Fechando a conexão
mysqli_close($conn);
?>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
try {
    // Configurações do servidor
    $mail->isSMTP();
    $mail->Host = 'smtp.exemplo.com'; // Substitua pelo servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'seuemail@exemplo.com'; // Seu e-mail
    $mail->Password = 'senha'; // Sua senha
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Remetente
    $mail->setFrom('salon@example.com', 'Salão de Beleza');
    $mail->addAddress('cliente@example.com', 'Cliente');

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Confirmação de Serviço - Salão de Beleza';
    $mail->Body    = '
    <html>
    <head>
      <title>Confirmação de Serviço</title>
    </head>
    <body>
      <h2>Confirmação de Serviço no Salão de Beleza</h2>
      <p>Olá, <strong>Cliente</strong></p>
      <p>Seu agendamento para o serviço foi confirmado! Abaixo estão os detalhes:</p>
      <ul>
        <li><strong>Serviço:</strong> Corte de Cabelo</li>
        <li><strong>Data e Hora:</strong> 25/03/2025 às 14:00</li>
        <li><strong>Local:</strong> Salão de Beleza XYZ</li>
      </ul>
      <p>Aguardamos sua visita! Qualquer dúvida, entre em contato conosco.</p>
      <p>Atenciosamente, <br>Salão de Beleza XYZ</p>
    </body>
    </html>';

    $mail->send();
    echo 'E-mail de confirmação enviado com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
}
?>