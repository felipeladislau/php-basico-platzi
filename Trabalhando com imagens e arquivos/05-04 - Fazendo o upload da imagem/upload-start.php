<!doctype html>
<html lang="pt-br">

<head>
  <title>Criação de moldura | PHP Básico Platzi</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />

  <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png"/>

  <link rel="stylesheet" href="dist/cropper.css">
  <style>
    .label {
      cursor: pointer;
    }

    .progress {
      display: none;
      margin-bottom: 1rem;
    }

    .alert {
      display: none;
    }

    .img-container img {
      max-width: 100%;
    }
  </style>

</head>
<body>



 <!-- ÁREA DO MODAL QUE VAI FAZER O CORTE DA IMAGEM, NÃO REMOVA NEM ALTERE O LOCAL -->
<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
</div>
<div class="alert" role="alert"></div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Cortar imagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="img-container">
          <img id="image" src="assets/img/avatar.jpg">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="crop">Cortar</button>
      </div>
    </div>
  </div>
</div>
 <!-- ÁREA DO MODAL QUE VAI FAZER O CORTE DA IMAGEM, NÃO REMOVA NEM ALTERE O LOCAL -->





<div class="container">
  <div class="navbar-translate">
  </div>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">

      </li>
    </ul>
  </div>
</div>

<div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/bg3.jpg'); height: 15%; ">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
      <a class="navbar-brand" href="index.php"></a>
        <div class="brand text-center">
        <br><br><br>
          <h2>Criação de fotos para perfil</h2>
          <h3 class="title text-center"></h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main main-raised" style="min-height: 700px;">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Digite seu nome, selecione sua moldura e envie sua foto!</h2>




      <!------ AQUI SERÁ INCLUÍDO O FORMULÁRIO COM NOME, SELEÇÃO DE IMAGEM E BOTÃO DE UPLOAD -------->
      <div style="margin-top: 5%; text-align:left;" class="container">
 
      <!------ AQUI SERÁ INCLUÍDO O FORMULÁRIO COM NOME, SELEÇÃO DE IMAGEM E BOTÃO DE UPLOAD -------->






        <!------ BOTÃO DE UPLOAD DA IMAGEM, SERÁ TRATADO PELO JAVASCRIPT, NÃO ALTERE! -------->
        <label class="label" data-toggle="tooltip" title="Alterar imagem selecionada">
          <img width="100%" class="rounded" id="avatar" src="assets/img/avatar.jpg" alt="avatar">
          <input type="file" class="sr-only" id="input" name="image" accept="image/*">
        </label>
        <!------ BOTÃO DE UPLOAD DA IMAGEM, SERÁ TRATADO PELO JAVASCRIPT, NÃO ALTERE! -------->


        <input type="hidden" name="imagem" id="imagem" value="" required />
        <div> 
          <input class="btn btn-primary" type="submit" name="enviar" id="enviar" />
        </div>
        
        </form>

      </div>

    </div>
  </div>
</div>


<footer class="footer footer-default">
  <div class="container">
    <nav class="float-left">
      <ul>
        <li>
          <a href="https://platzi.com/">
          Curso PHP Básico - Platzi
          </a>
        </li>
      </ul>
    </nav>
    <div class="copyright float-right">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>, todos os direitos reservados.
    </div>
  </div>
</footer>


<!------ AQUI TEMOS AS BIBLIOTECAS E CLASSES QUE VÃO TRATAR O CORTE DA 
IMAGEM E SALVAR A MESMA NA PASTA PARA QUE POSSAMOS PROCESSA-LA DEPOIS ------->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.bundle.min.js"></script>
<script src="dist/cropper.js"></script>

<script>
// Verifica se o upload foi feito.
  window.addEventListener('DOMContentLoaded', function () {
    // Definimos o avatar, a imagem, o input, as barras de progresso e os alertas.
    var avatar = document.getElementById('avatar');
    var image = document.getElementById('image');
    var input = document.getElementById('input');
    var $progress = $('.progress');
    var $progressBar = $('.progress-bar');
    var $alert = $('.alert');
    var $modal = $('#modal');
    var cropper;

    $('[data-toggle="tooltip"]').tooltip();


    // Lendo o arquivo para o upload
    input.addEventListener('change', function (e) {
      var files = e.target.files;
      var done = function (url) {
        input.value = '';
        image.src = url;
        $alert.hide();
        $modal.modal('show');
      };
      var reader;
      var file;
      var url;

      if (files && files.length > 0) {
        file = files[0];

        if (URL) {
          done(URL.createObjectURL(file));
        } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
            done(reader.result);
          };
          reader.readAsDataURL(file);
        }
      }
    });

    // Mostra o modal de corte da imagem
    $modal.on('shown.bs.modal', function () {
      cropper = new Cropper(image, {
        aspectRatio: 1, // Aspecto, 1 x 1
        viewMode: 3,
      });
    }).on('hidden.bs.modal', function () {
      cropper.destroy(); // Destroi o objeto se o modal for fechado.
      cropper = null;
    });

    // Corte feito com sucesso, agora vamos processar.
    document.getElementById('crop').addEventListener('click', function () {
      var initialAvatarURL;
      var canvas;

      // Esconde o modal
      $modal.modal('hide');

      if (cropper) {
        canvas = cropper.getCroppedCanvas({
          width: 512, // Largura da imagem que será salva.
          height: 512, // Altura da imagem
        });
        initialAvatarURL = avatar.src;
        avatar.src = canvas.toDataURL();

        var imagemFinal = avatar.src;
        
        $progress.show(); // Mostra o progresso e o alerta de sucesso.
        $alert.removeClass('alert-success alert-warning');
        canvas.toBlob(function (blob) {
          var formData = new FormData();

          formData.append('avatar', blob, 'avatar.jpg');
          $.ajax('post.php', {
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,

            xhr: function () {
              var xhr = new XMLHttpRequest();

              xhr.upload.onprogress = function (e) {
                var percent = '0';
                var percentage = '0%';

                if (e.lengthComputable) {
                  percent = Math.round((e.loaded / e.total) * 100);
                  percentage = percent + '%';
                  $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                }
              };

              return xhr;
            },

            success: function () { // Alerta de sucesso
              $alert.show().addClass('alert-success').text('Corte realizado com sucesso');
            },

            error: function () {
              //avatar.src = initialAvatarURL;
              //$alert.show().addClass('alert-warning').text('Erro no upload');
              console.log("Erro no upload"); // Alerta de erro
            },

            complete: function () {
              $progress.hide(); // Finalizou, esconde o progresso.
            },
          });
        });
      }

      var nome = "Felipe";
      var moldura = "teste1";
      console.log(avatar.src);

      var queryString = "?nome=" + nome + "&moldura=" + moldura + "&imagem=" + avatar.src;
      
      document.getElementById("imagem").value = avatar.src;

    });
  });

  
</script>

</body>
</html>