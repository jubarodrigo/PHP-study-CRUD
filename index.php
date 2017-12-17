		<div class="container">
      <?php

      require_once 'autoloader.php';

      session_start();

      use Controller\BannerController\BannerController as BannerController;
      $BannerController = new BannerController();

      use src\Conecta\Conexao as Conexao;
      use src\View as View;


      if (!isset($_GET['route'])){
        $_GET['route'] = "home";
      }

      switch ($_GET['route']) {
        case 'home':
          View::render(null,"./View/home.php");
        break;

        case 'banner':
          View::render(BannerController::listarBanner(),"./View/Banner/BannerListagem.php");
        break;

        case 'banner/create':
          View::render($BannerController->salvarBanner(),"./View/Banner/BannerCreate.php");
        break;

        case 'banner/delete':
          View::render($BannerController->exclueBanner(),"./View/Banner/BannerListagem.php");
        break;

        case 'banner/update':
          View::render($BannerController->alterarBanner(),"./View/Banner/BannerUpdate.php");
        break;

        default:
          View::render(null,"./View/home.php");
        break;
      }
      ?>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="src/bootstrap/js/bootstrap.min.js"></script>
  </html>