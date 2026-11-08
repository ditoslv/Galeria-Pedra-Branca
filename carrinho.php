

<?php
session_start();
require_once('conexao.php');
if (!isset($_SESSION['email'])) {
    // Redirecionar para a página de login se o usuário não estiver logado e passar uma flag
    header('Location: login.php?from=carrinho');
    exit;
}

// Verificar se o usuário está logado
if (!isset($_SESSION['email'])) {
    // Redirecionar para a página de login se o usuário não estiver logado
    header('Location: login.php');
    exit;
}

// Inicializar variáveis
$logado = true;
$email = $_SESSION['email'];

// Fazer uma única consulta para verificar se o usuário é admin
$result = $conn->query("SELECT is_admin FROM usuarios WHERE email = '$email'");
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $is_admin = $user['is_admin'] == 1;
}

// Obtém o ID do usuário logado
$user_id = $_SESSION['user_id'];


// Adiciona o item ao carrinho
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verifica se o item já está no carrinho
    $stmt = $conn->prepare("SELECT * FROM carrinho WHERE user_id = ? AND obra_id = ?");
    $stmt->bind_param("ii", $user_id, $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO carrinho (user_id, obra_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $user_id, $id);
        $stmt->execute();
    }
}

// Remove item do carrinho
if (isset($_GET['remove_id'])) {
    $remove_id = $_GET['remove_id'];
    $stmt = $conn->prepare("DELETE FROM carrinho WHERE user_id = ? AND obra_id = ?");
    $stmt->bind_param("ii", $user_id, $remove_id);
    $stmt->execute();
}

// Consulta os itens no carrinho
$items = array();
$stmt = $conn->prepare("SELECT o.id, o.nome, o.foto FROM obras o JOIN carrinho c ON o.id = c.obra_id WHERE c.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="edits.css?time=<?php echo time(); ?>">
    <link rel="icon" href="img/logos/LOGO.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Cabeçalho e menu -->
    <header class="container topo">
        <div class="row">
            <div class="col-sm-3">
                <a href="index.php"><img src="img/logos/LOGO.jpg" alt=""></a>
            </div>
            <div class="col-sm-9">
                <nav class="menu">
                    <ul class="nav justify-content-end">
                        <li class="nav-item"><a class="nav-link" href="index.php">PÁGINA INICIAL</a></li>
                        <li class="nav-item"><a class="nav-link" href="listagem.php">ACERVO</a></li>
                        <li class="nav-item"><a class="nav-link" href="exposicoes.php">EXPOSIÇÕES</a></li>
                        <li class="nav-item"><a class="nav-link" href="historia.php">HISTÓRIA</a></li>
                        <li class="nav-item"><a class="nav-link" href="carrinho.php"><u>CARRINHO</u></a></li>
                        <?php if ($logado): ?>
                            <?php if ($is_admin): ?>
                                <li class="nav-item"><a class="nav-link" href="cadastro_obras.php">CADASTRAR OBRAS</a></li>
                            <?php endif; ?>
                            <li class="nav-item"><a class="nav-link" href="logout.php">SAIR</a></li>
                            <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="login.php">ENTRAR</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        <h1>Carrinho de Compras</h1>
        <?php if (!empty($items)): ?>
            <div class="row">
                <?php foreach ($items as $item): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="uploads/<?php echo htmlspecialchars($item['foto']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['nome']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($item['nome']); ?></h5>
                                <a href="carrinho.php?remove_id=<?php echo $item['id']; ?>" class="btn btn-danger">Remover</a>
                            </div>
                            <div class="card-body">
                                <a href="detalharcarrinho.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">Detalhar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                O carrinho está vazio.
            </div>
        <?php endif; ?>
    </div>

    <footer class="container">
        <div class="row">
            <div class="col-sm">
                <div class="rodape">
                </br>  </br>  </br>  </br>    
                <img src="img/logos/LOGO.jpg" alt="" class="rounded mx-auto d-block ">
                    <ul class="nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/casapedrabranca/" target="_blank">
                            <div class="col-sm-3">
                                <img class="foto" src="img/logos/instagramLogo.png">
                            </div></a></li>
                        <li class="nav-item"><a class="nav-link" href="https://www.google.com/maps/place/Pra%C3%A7a+Antonio+Ferraz,+144+-+Floresta,+PE,+56400-000/@-8.6027588,-38.5697614,17z/data=!3m1!4b1!4m5!3m4!1s0x709f49dec339429:0xd169835b1b0aaa7e!8m2!3d-8.6027588!4d-38.5697614?entry=ttu" target="_blank">
                            <div class="col-sm-3">
                                <img class="foto" src="img/logos/localizacaoLogo.png">
                            </div></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="https://api.whatsapp.com/send/?phone=5587999837085&text&type=phone_number&app_absent=0" target="_blank">
                            <div class="col-sm-3">
                                <img class="foto" src="img/logos/whatsLogo.png">
                            </div></a>
                        </li>
                        <li class="nav-item"><a >
                            <div class="col-sm-3">
                                <img class="foto" src="img/logos/copyrigth.png">
                            </div></a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </footer>  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

