const menu = ` 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="hadmin.php">Distribuidora SVA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Ventas
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="ventas.html">Ventas Diarias</a></li>
        <li><a class="dropdown-item" href="ventasVendedor.html">Ventas por Vendedor</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="planillaVentas.html">Planilla de Ventas</a></li>
        </ul>
        </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Repartos
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="">Descuentos y Faltantes</a></li>
        <li><a class="dropdown-item" href="#">Gastos de Repartos</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="../reparto/caja_rep.php">Planilla de Reparto</a></li>
        </ul>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Cuentas Corrientes
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="cc_total.html">Ver Saldos Pendientes</a></li>
        <li><a class="dropdown-item" href="saldosPorDia.html">Ver Saldos por Zona</a></li>
        <li><a class="dropdown-item" href="saldos-cobrados.html">Saldos Cobrados</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Provedores
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="provedores.html">Provedores</a></li>
        <li><a class="dropdown-item" href="compras.html">Compras</a></li>
        <li><a class="dropdown-item" href="../provedores/nota_credito.php">Notas de Credito</a></li>
        <li><a class="dropdown-item" href="../provedores/nota_debito.php">Notas de Debito</a></li>
        <li><a class="dropdown-item" href="../provedores/orden_pago.php">Orden de Pago</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="../provedores/new_prov.php">Lista Provedores</a></li>
        </ul>
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Usuarios
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="#">Nuevo Usuario</a></li>
        <li><a class="dropdown-item" href="#">Editar Usuario</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="usuarios.html">Usuarios</a></li>
        </ul>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" href="../php/cerrar_session.php">Cerrar Session</a>
        </li>
        
       
      </ul>
    </div>
  </div>
</nav>`
 

$('#menu').html(menu);
