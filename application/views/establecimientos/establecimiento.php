<div class="content-wrapper-before gradient-45deg-indigo-blue"></div>

<div class="breadcrumbs-dark pb-2 pt-1" id="breadcrumbs-wrapper">
  	<!-- Search for small screen-->
  	<div class="container">
    	<div class="row">
      		<div class="col s10 m6 l6">
        		<h5 class="breadcrumbs-title mt-0 mb-0">Administración de empleados</h5>
        		<ol class="breadcrumbs mb-0">
          			<li class="breadcrumb-item"><a>Panel</a></li>
          			<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>establecimientos">Establecimientos</a></li>
          			<li class="breadcrumb-item active"><a>Establecimiento</a></li>
        		</ol>
      		</div>
			<div class="col s2 m6 l6 right-align">
				<a href="<?php echo base_url(); ?>establecimientos" class="btn waves-effect waves-light breadcrumbs-btn right btn-small default" ><i class="material-icons left">keyboard_arrow_left</i> <span class="hide-on-small-onl">Volver</span></a>
            </div>
    	</div>
  	</div>
</div>

<div class="col s12 m12 section-data-tables">
	<div class="container">
		<div class="section">
			<div class="row">
				<div class="col s12 m5 l4">
					<div class="card card-default">
						<div class="card-content">
							<h4 style="margin-bottom: 0px;"><?php echo $establecimiento->nombre; ?></h4>
							<?php if($establecimiento->cant_empleados == 1){ ?>
							<label class="active" style="font-weight: bolder; color: #333;">Posee un total de <?php echo $establecimiento->cant_empleados; ?> empleado</label>
							<?php }else{ ?>
			    			<label class="active" style="font-weight: bolder; color: #333;">Posee un total de <?php echo $establecimiento->cant_empleados; ?> empleados</label>
							<?php } ?>
			    			<div class="input-field" style="margin-top: 25px;">
			    				<label class="active">Empresa</label>
			    				<h6><?php echo $establecimiento->empresa_nombre; ?></h6>
			    			</div>
			    			<div class="input-field" style="margin-top: 35px;">
			    				<label class="active">Dirección</label>
			    				<h6><?php echo $establecimiento->direccion; ?></h6>
			    			</div>
			    			<div class="input-field" style="margin-top: 35px;">
			    				<label class="active">Población</label>
			    				<h6><?php echo $establecimiento->poblacion_nombre; ?></h6>
			    			</div>
			    			<div class="input-field" style="margin-top: 35px;">
			    				<label class="active">Provincia</label>
			    				<h6><?php echo $establecimiento->provincia_nombre; ?></h6>
			    			</div>
						</div>
					</div>
					<div class="card-alert card gradient-45deg-amber-amber">
						<div class="card-content white-text">
							<p>Recuerde que se guardará un historial de cada acción que se le realice a cada empleado dentro del establecimiento.</p>
						</div>
					</div>
				</div>
				<div class="col s12 m7 l8">
					<?php if($establecimiento->estado == 1 && $establecimiento->cant_empleados < $cuenta->suscripcion_cant_empleados){ ?>
					<div class="card card-default">
						<div class="card-content">
							<form action="" id="form_buscador_dni" class="col s12">
								<div class="input-field col m8 s12">
									<input placeholder="Busque por DNI" type="text" id="f_buscador_dni" class="validate">
									<label>Añada nuevos empleados</label>
								</div>
								<div class="input-field col m4 s12 center-align">
									<div class="input-field col s12">
										<button class="btn waves-effect waves-light" id="btnBuscarUsuario" type="submit" name="action"><i class="material-icons right">search</i> Buscar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<?php } ?>
					<div class="card card card-default scrollspy">
						<div class="card-content">
							<h4 class="card-title">Lista de empleados</h4>
							<div class="row">
								<div class="col s12"></div>
								<div class="col s12 tabla_empleados">
									<table class="responsive-table" id="tabla_empleados">
										<thead>
											<tr>
												<th class="mismalinea">Nombre</th>
												<th width="1%">DNI</th>
												<th width="1%">Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php if(count($empleados) == 0){ ?>
											<tr>
												<th colspan="3" class="center-align">No posee ningún empleado agregado.</th>
											</tr>
											<?php }else{ ?>
												<?php foreach ($empleados as $empleado) { ?>
													<tr>
														<th><?php echo $empleado->usuario_nombre_completo; ?></th>
														<th width="1%"><?php echo $empleado->usuario_dni; ?></th>
														<th width="1%" class="center-align mismalinea">
															<?php if($empleado->estado == 1){ ?>
																<button type="button" onclick="suspender_empleado('<?php echo $empleado->id; ?>', '<?php echo $empleado->usuario_nombre_completo; ?>')" class="waves-effect waves-light btn-small orange darken-4"><i class="material-icons">block</i></button>
															<?php }else{ ?>
																<button type="button" onclick="activar_empleado('<?php echo $empleado->id; ?>', '<?php echo $empleado->usuario_nombre_completo; ?>')" class="waves-effect waves-light btn-small blue darken-4"><i class="material-icons">cached</i></button>
															<?php } ?>
															<button type="button" onclick="eliminar_empleado('<?php echo $empleado->id; ?>', '<?php echo $empleado->usuario_nombre_completo; ?>')" class="waves-effect waves-light red darken-4 btn-small"><i class="material-icons">delete</i></button>
														</th>
													</tr>
												<?php } ?>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	hr{
		border: 0px;
		border-bottom: 1px solid #e0e0e0;
		margin: 15px 0px;
	}
	#modalBuscador img{
		width: 150px;
	}
	#modalBuscador .input-field{
		display: block;
		position: relative;
		margin-bottom: 35px;
	}
</style>
<?php if($establecimiento->estado == 1 && $establecimiento->cant_empleados < $cuenta->suscripcion_cant_empleados){ ?>
<div id="modalBuscador" class="modal">
    <div class="modal-content">
    	<h5 style="margin-top: 0px;">Información del usuario</h5>
    	<hr>
    	<div class="row">
    		<div class="col m-4">
    			<img src="<?php echo base_url(); ?>assets/css/images/profile_user_default.png" class="responsive-img" alt="">
    		</div>
    		<div class="col m-8">
    			<div class="input-field">
    				<label class="active">Nombre y apellido</label>
    				<h6 id="modalBuscador-nombre"></h6>
    			</div>
    			<div class="input-field">
    				<label class="active">DNI</label>
    				<h6 id="modalBuscador-dni"></h6>
    			</div>
    			<div class="input-field">
    				<label class="active">Correo electrónico</label>
    				<h6 id="modalBuscador-correo"></h6>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="modal-footer">
    	<input type="hidden" id="modalBuscador-id" value="">
      	<button type="button" class="modal-action modal-close waves-effect btn-flat">Cancelar</button>
      	<button type="button" class="modal-action btn waves-effect waves-light" id="btnAgregarEmpleado">Agregar</button>
    </div>
</div>
<?php } ?>

<?php echo $js_establecimiento; ?>
