<?php 
session_set_cookie_params(1800); // 1800 segundos = 30 minutos
session_start();


require_once("templates/header.php");
require_once("dao/UserDAO.php");


/*
//Dao dos filmes
$processDAO = new ProcessDAO($conn, $BASE_URL);

// Verifica o token, se não for o correto redireciona para a home
$auth = new UserDAO($conn, $BASE_URL);

$userData = $auth->verifyToken();

$userMovies = $movieDao->getMoviesByUserId($userData->id);
*/
?>

<div id="main-container" class="container-fluid">
 <h2 class="section-title">Dashboard</h2>
 <p class="section-description">Adicione ou atualize as informações dos filmes que você enviou</p>
 <div class="col-md-12" id="add-movie-container">
    <a href="<?=$BASE_URL?>newmovie.php" class="btn card-btn"><i class="fas fa-plus"></i>Adicionar filme</a>
 </div>
    <div class="col-md-12" id="movies-dashboard">
        <table class="table">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Nota</th>
                <th scope="col" class="actions-column">Ações</th>
            </thead>
            <tbody>
                <?php foreach($userProcess as $$process): ?>
                <tr >
                    <td scope="row"><?=$movie->id?></td>
                    <td><a href="<?=$BASE_URL?>movie.php?id=<?=$movie->id?>" class="table-movie-title"><?=$movie->title?></a></td>
                    <td><i class="fas fa-star"></i><?=$movie->rating?></td>
                    <td class="actions-column">
                        <a href="<?=$BASE_URL?>editmovie.php?id=<?=$movie->id?>" class="edit-btn">
                            <i class="far fa-edit"></i>Editar
                        </a>
                        <form action="<?=$BASE_URL?>movie_process.php?id=<?= $movie->id ?>" method="POST">
                            <input type="hidden" name="type" value="delete">
                            <input type="hidden" name="id" value="<?=$movie->id?>">
                            <button type="submit" class="delete-btn">
                                <i class="fas fa-times"></i>Deletar
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php 
require_once("templates/footer.php");

?>