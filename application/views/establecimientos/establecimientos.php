<div class="content-wrapper-before gradient-45deg-indigo-blue"></div>

<div class="breadcrumbs-dark pb-2 pt-1" id="breadcrumbs-wrapper">
  	<!-- Search for small screen-->
  	<div class="container">
    	<div class="row">
      		<div class="col s10 m6 l6">
        		<h5 class="breadcrumbs-title mt-0 mb-0">Administración de establecimientos</h5>
        		<ol class="breadcrumbs mb-0">
          			<li class="breadcrumb-item"><a>Panel</a></li>
          			<li class="breadcrumb-item active"><a>Establecimientos</a></li>
        		</ol>
      		</div>
			<div class="col s2 m6 l6 right-align">
				<?php if($cuenta->cant_establecimientos < $cuenta->suscripcion_cant_establecimientos){ ?>
				<button type="button" class="btn waves-effect btn-small waves-light breadcrumbs-btn" onclick="mostrar_info('modulo_carga', 'modulo_lista');"><span class="hide-on-small-onl">Nuevo</span><i class="material-icons right">add</i></button>
				<?php } ?>
            </div>
    	</div>
  	</div>
</div>

<?php if($cuenta->cant_establecimientos < $cuenta->suscripcion_cant_establecimientos){ ?>
<div  class="col s12 l12" id="modulo_carga">
	<div class="container">
		<div class="section">
			<div class="card card card-default scrollspy" style="overflow: visible !important;">
			    <div class="card-content">
			      	<h4 class="card-title">Agrega un nuevo establecimiento</h4>
			      	<form action="<?php echo base_url(); ?>establecimientos/guardar" class="formValidate" method="post" id="f_form" name="f_form">
			        	<div class="row">
			          		<div class="select-field col m4 s12">
			            		<label for="f_establecimiento_empresa">Empresa</label>
			            		<select class="browser-default" name="f_establecimiento_empresa" id="f_establecimiento_empresa" data-error=".errorTxt1">
			                      <option value="" disabled selected>Seleccione una opción</option>
			                      <?php foreach ($empresas as $empresa) { ?>
			                      <option value="<?php echo $empresa->id; ?>"><?php echo $empresa->nombre; ?></option>
			                      <?php } ?>
			                    </select>
			                    <div class="errorTxt1 mismalinea"></div>
			          		</div>
			          		<div class="input-field col m4 s12">
			            		<input id="f_establecimiento_nombre" name="f_establecimiento_nombre" type="text" data-error=".errorTxt2">
			            		<label for="f_establecimiento_nombre">Nombre</label>
			            		<div class="errorTxt2 mismalinea"></div>
			          		</div>
			          		<div class="input-field col m4 s12">
	                      		<input id="f_establecimiento_direccion" name="f_establecimiento_direccion" type="text" data-error=".errorTxt3">
	                      		<label for="f_establecimiento_direccion">Dirección</label>
	                      		<div class="errorTxt3 mismalinea"></div>
                    		</div>
			        	</div>
		                <div class="row">
		                  <div class="select-field col m5 s12">
		                    <label for="f_establecimiento_provincia">Provincia</label>
		                    <select class="browser-default" name="f_establecimiento_provincia" id="f_establecimiento_provincia" data-error=".errorTxt4">
		                      <option value="" disabled selected>Seleccione una opción</option>
		                      <?php foreach ($provincias as $provincia) { ?>
		                      <option value="<?php echo $provincia->provinciaid; ?>"><?php echo $provincia->provincia; ?></option>
		                      <?php } ?>
		                    </select>
		                    <div class="errorTxt4 mismalinea"></div>
		                  </div>
		                  <div class="select-field col m5 s12">
		                    <label for="f_establecimiento_poblacion">Población</label>
		                    <select disabled class="browser-default" name="f_establecimiento_poblacion" id="f_establecimiento_poblacion" data-error=".errorTxt5">
		                      <option value="" selected>Seleccione una opción</option>
		                    </select>
		                    <div class="errorTxt5 mismalinea"></div>
		                  </div>
		                  <div class="input-field col m2 s12">
		                      <label for="f_establecimiento_cod_postal">Cód. postal</label>
		                      <input name="f_establecimiento_cod_postal" id="f_establecimiento_cod_postal" type="text" data-error=".errorTxt6">
		                      <div class="errorTxt6 mismalinea"></div>
		                    </div>
		                </div>
		          		<div class="row">
		            		<div class="input-field col s12 right-align">
		              			<button type="button" class="waves-effect btn-flat" onclick="mostrar_info('modulo_carga', 'modulo_lista');">Cancelar</button>
		              			<button class="btn waves-effect waves-light" type="submit">Crear</button>
		            		</div>
		          		</div>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<div class="col s12 l12 section-data-tables" id="modulo_lista">
	<div class="container">
		<div class="section">
			<?php if($cuenta->cant_establecimientos >= $cuenta->suscripcion_cant_establecimientos){ ?>
			<div class="card-alert card colormenupers">
				<div class="card-content white-text">
					<p><i class="material-icons">error</i> ATENCIÓN: Ha llegado al máximo de establecimientos posibles por crear. Si desea seguir agregando más, deberá <a href="#">actualizar su suscripción</a>.</p>
				</div>
			</div>
			<?php } ?>
			<div class="row">
				<div class="col s12 m12 l12">
					<div id="responsive-table" class="card card-default scrollspy">
						<div class="card-content">
							<h4 class="card-title">Lista de establecimientos</h4>
							<div class="row">
								<div class="col s12"></div>
								<div class="col s12 tabla_establecimientos">
									<table class="display" id="page-length-option">
										<thead>
											<tr>
												<th>id</th>
												<th class="mismalinea" width="1%"><strong>Nombre</strong></th>
												<th width="1%"><strong>Empresa</strong></th>
                        <th width="1%"><strong>Población</strong></th>
												<th width="1%"><strong>Provincia</strong></th>
												<th width="1%" class="center-align"><strong>Acciones</strong></th>
											</tr>
										</thead>
										<tbody>
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

<?php echo $js_establecimientos; ?>
