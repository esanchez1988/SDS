<!--<ul id="accordion">
	<li accordion-container><a class="accordion-titulo" href="#">Menu</a>
		<ul class="accordion-content" style="height: auto;">
			<li><a href="<?php echo base_url('gestor/personas')?>">Personas</a></li>
		</ul>                
	</li>
	<li accordion-container><a class="accordion-titulo" href="#">Menu 2</a>
		<ul class="accordion-content">
			<li><a href="#">Opci&oacute;n 1</a></li>
			<li><a href="#">Opci&oacute;n 2</a></li>
			<li><a href="#">Opci&oacute;n 3</a></li>
			<li><a href="#">Opci&oacute;n 4</a></li>
			<li><a href="#">Opci&oacute;n 5</a></li>
		</ul>                
	</li>
	<li accordion-container><a class="accordion-titulo" href="#">Menu 3</a>
		<ul class="accordion-content">
			<li><a href="#">Opci&oacute;n 1</a></li>
			<li><a href="#">Opci&oacute;n 2</a></li>
			<li><a href="#">Opci&oacute;n 3</a></li>
		</ul>                
	</li>
</ul>-->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Inicio</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url('admin/usuarios')?>">Usuarios</a></li>  
        <li><a href="<?php echo base_url('admin/personas')?>">Personas</a></li>  
		<li><a href="<?php echo base_url('admin/reporte_efectivo')?>">Reportes</a></li>    	
		<li><a href="<?php echo base_url('admin/reporte_planos')?>">Archivos Planos</a></li>    	
		<!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('admin/reporte_efectivo')?>">Efectivos</a></li>
            <li><a href="<?php echo base_url('admin/reporte_no_efectivo')?>#">No Efectivos</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url('admin/usuarios')?>">Usuarios</a></li>  -->	      
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrador <span class="caret"></span></a>
          <!--<ul class="dropdown-menu">
            <!--<li><a href="<?php echo base_url('usuario/perfil')?>">Perfil</a></li>
            <li><a href="<?php echo base_url('login/logout_ci')?>#">Cerrar Sesi&oacute;n</a></li>
          </ul>-->
        </li>
			<a type="button" class="btn btn-danger" href="<?php echo base_url('login/logout_ci')?>#">Cerrar Sesi&oacute;n</a>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>