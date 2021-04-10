<?php
include('./pages/cadastro/connection.php');
include('./pages/cadastro/ler.php');
include('./pages/comentarios/create.php');
include('./pages/comentarios/read.php');
include('./pages/comentarios/delete.php');
include('./pages/login/logout.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
	<link rel="stylesheet" href="./styles/style.css">
	<link rel="stylesheet" href="./styles/index.css">
	<title>P1 Fernando Leonid</title>
</head>

<body>
	<div class="container-fluid">
		<article class="row justify-content-around mt-3">
			<div class="card">
				 <form action="" method="POST">
					<div class="switch__container">
						<hr>
						<hr>
						<hr>
						<hr>
					</div>
					<h3>Fórum sobre Redes Sociais</h3>
					<h3>P1 Fernando</h3>

					<?php if (!isset($_SESSION['id'])) {  ?>
						<div>
							<img class="imgLogin" src=<?php echo "./images/Anonimo.jpg"; ?> alt="Imagem de usuario anonimo">
							<span class="login"><?php echo "Anônimo" ?></span>
						</div>
						<a href="./pages/login/index.php" class="btnLogout">Login <i class="far fa-user-circle"></i></a>
					<?php } else { ?>
						<div>
							<img class="imgLogin" src=<?php echo "./pages/cadastro/img/{$_SESSION['avatar']}"; ?> alt="Imagem de avatar do usuário">
							<span class="login"><?php echo $_SESSION['login'] ?></span>
						</div>
						<button type="submit" name="btnLogout" class="btnLogout">Logout <i class="far fa-user-circle"></i></button>
					<?php } ?>

				</form>

				<img src="./images/Redes.jpg" alt="Imagens de Redes Sociais">

				<h5 class="" for="">Escreva sua opinião</h5>

				<!-- PUBLICAÇÃO -->
				<form class="publicacoes" action="" method="POST">
					<div class="comentarios">
						<img src="<?php echo isset($_SESSION['id']) ? "./pages/cadastro/img/{$_SESSION['avatar']}" : "./images/Anonimo.jpg"; ?>" class="avatar" alt="meu avatar">
						<textarea class="comentario" name="comentario" placeholder="Insira seu comentário aqui..."></textarea>
						<button class="btnPublicar" name="btnPublicar" type="submit">Publicar</button>
					</div>
					<!-- FINAL PUBLICAÇÃO -->

					<hr class="">

					<!-- COMENTARIO -->
					<?php if (!empty(read())) {
						foreach (read() as $value) { ?>
							<div>
								<div class="comentarios">
									<img src="<?php echo $value->avatar ? "./pages/cadastro/img/{$value->avatar}" : "./images/Anonimo.jpg" ?>" class="avatar" alt="meu avatar">
									<div>
										<h5 class="dadosUsuario"><?php
										echo ($value->login ? $value->login : "Anônimo") ?></h5>
										<p class="comentario"><?php echo $value->comentario ?></p>
									</div>
									<!-- BOTOES -->
									<div class="botoes">
										<?php if (isset($_SESSION['id']) == $value->id) { ?>
											<button type="submit" name="btnExcluir" class="btnExcluir" value="<?php echo $value->idComentario ?>">Excluir <i class="fas fa-ban"></i></button>
										<?php } ?>
									</div>
								</div>
								<hr>
							</div>
					<?php }
					}
					?>
					<!-- FINAL COMENTARIO -->
				</form>
		</article>
	</div>
</body>

</html>
