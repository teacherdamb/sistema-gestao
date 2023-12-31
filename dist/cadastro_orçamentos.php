<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2023 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
-->

<!-- Breadcrumb-->
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Cadastrar orçamento</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/avsys.svg">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/avsys.svg">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/avsys.svg">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/avsys.svg">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/avsys.svg">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/avsys.svg">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/avsys.svg">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/avsys.svg">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/avsys.svg">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/avsys.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/avsys.svg">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/avsys.svg">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/avsys.svg">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" href="assets/img/avsys.svg">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="node_modules/simplebar/dist/simplebar.css">
    <link rel="stylesheet" href="css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/mycss.css">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="css/examples.css" rel="stylesheet">
    <link href="node_modules/@coreui/chartjs/dist/css/coreui-chartjs.css" rel="stylesheet">
  </head>
  <body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 20px; margin-bottom: 2%;">
          <img src="./assets/img/atomo-logo.svg" style="margin-bottom: 7%;" class="sidebar-brand-full" width="118" height="46" alt="">
          <h6 style="color: orangered; font-weight: 700;">Sistema Phoenix</h6>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item"><a class="nav-link" href="index.php">
            <svg class="nav-icon">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">Novo</span></a></li>
        <li class="nav-title">Usuários</li>
        <li class="nav-item"><a class="nav-link" href="cadastro_usuarios.php">
            <svg class="nav-icon">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-drop"></use>
            </svg> Cadastrar Usuários</a></li>
            <li class="nav-item"><a class="nav-link" href="visualizar_usuarios.php">
              <svg class="nav-icon">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-drop"></use>
              </svg> Visualizar Usuários</a></li>

        <li class="nav-title">Orçamentos</li>
        <li class="nav-item"><a class="nav-link" href="cadastro_orlamentos.php">
            <svg class="nav-icon">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-drop"></use>
            </svg> Cadastrar um orçamento</a></li>
            <li class="nav-item"><a class="nav-link" href="visualizar_orcamentos.php">
              <svg class="nav-icon">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-drop"></use>
              </svg> Visualizar orçamentos</a></li>
      </ul>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-4">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-menu"></use>
            </svg>
          </button><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
              <use xlink:href="assets/brand/coreui.svg#full"></use>
            </svg></a>
          <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
          </ul>
          <ul class="header-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bell"></use>
                </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-list-rich"></use>
                </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-envelope-open"></use>
                </svg></a></li>
          </ul>
          <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/8.jpg" alt="user@email.com"></div></a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Account</div>
                </div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bell"></use>
                  </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-envelope-open"></use>
                  </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-task"></use>
                  </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-comment-square"></use>
                  </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-user"></use>
                  </svg> Profile</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-settings"></use>
                  </svg> Settings</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-credit-card"></use>
                  </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-file"></use>
                  </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-lock-locked"></use>
                  </svg> Lock Account</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-account-logout"></use>
                  </svg> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </header>
      <div class="body flex-grow-1 px-1">
        <div class="container-lg">
            <div class="row">
              <div>
                <h2>Cadastrar um Orçamento</h2>
                <div class="form-criar-usuarios">
                  <div class="container">
                  <form action="criar_orcamentoBD.php" method="POST">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="nome" class="from-criar-usuario pb-2">Nome / Razão Social:</label>
                                <input type="text" class="form-control" id="nome" placeholder="Digite o nome ou razão social..." name="nome">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="cnpj" class="pb-2">CNPJ:</label>
                                <input type="text" class="form-control" placeholder="Digite um CNPJ..." id="cnpj" name="cnpj">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="email" class="pb-2">E-mail:</label>
                                <input type="email" class="form-control" placeholder="Digite o e-mail..." id="email" name="email">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="endereco" class="from-criar-usuario pb-2">Endereço:</label>
                                <input type="text" class="form-control" id="endereco" placeholder="Rua, numero - Cidade..." name="endereco">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="bairro" class="from-criar-usuario pb-2">Bairro:</label>
                                <input type="text" class="form-control" placeholder="Digite o bairro..." id="bairro" name="bairro">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="cep" class="pb-2">CEP:</label>
                                <input type="text" class="form-control" placeholder="xx.xxx-xxx" id="cep" name="cep">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="consultor" class="pb-2">Consultor:</label>
                                <input type="text" class="form-control" placeholder="Nome do consultor..." id="consultor" name="consultor">
                            </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                              <label for="layout" class="pb-2">Fazer layout:</label>
                              <select class="form-select" id="layout" name="layout"> <!-- Adicionei o atributo 'name' aqui -->
                                  <option selected>Escolha uma opção...</option>
                                  <option value="sim">Sim</option>
                                  <option value="nao">Não</option>
                              </select>
                          </div>
                      </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="largura" class="from-criar-usuario pb-2">Largura:</label>
                                <input type="number" class="form-control" id="largura" name="largura">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="altura" class="pb-2">Altura:</label>
                                <input type="number" class="form-control" id="altura" name="altura">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="comprimento" class="pb-2">Comprimento:</label>
                                <input type="number" class="form-control" id="comprimento" name="comprimento">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="material" class="from-criar-usuario pb-2">Material utilizado:</label>
                                <input type="text" class="form-control" id="material" name="material">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="valor" class="pb-2">Valor:</label>
                                <input type="number" class="form-control" id="valor" name="valor">
                            </div>
                        </div>
                    </div>
                    <div class="create-user">
                        <button type="submit" class="btn btn-success">Cadastrar orçamento</button>
                    </div>
                </form>

                  </div>
                </div>
                  </form>
              </div>
        </div>
      </div>
      <footer class="footer">
        <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> &copy; 2023 creativeLabs.</div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
      </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>
    <script src="node_modules/simplebar/dist/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="node_modules/chart.js/dist/chart.min.js"></script>
    <script src="node_modules/@coreui/chartjs/dist/js/coreui-chartjs.js"></script>
    <script src="node_modules/@coreui/utils/dist/coreui-utils.js"></script>
    <script src="js/main.js"></script>
    <script>
    </script>
  </body>
</html>