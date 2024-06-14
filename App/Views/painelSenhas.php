<?php

$tituloPainel = "FILA DE ESPERA";

$codDepartamento = $_GET['codDepartamento'];

if ($codDepartamento !== null) {



	$codDepartamento = json_encode($codDepartamento);



	$nomesDepartamentos = lookupCodNomeDepartamentosJson($codDepartamento);




	$tituloPainel = "";
	foreach ($nomesDepartamentos as $Departamento) {
		$tituloPainel .= $Departamento->descricaoDepartamento . " | ";
	}
	$tituloPainel = rtrim($tituloPainel, "| ");
} else {

	$codDepartamento = null;
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--	<meta http-equiv="refresh" content="300"> -->

	<title>Sandra </title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="<?php echo base_url('/imagens/favicon.ico') ?>" type="image/x-icon" />


	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/adminlte/dist/css/adminlte.min.css">

	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/adminlte/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/adminlte/plugins/toastr/toastr.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/adminlte/plugins/select2/css/select2.min.css">

	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

	<!-- DATATABLES -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

	<script>
		var csrfName = '<?php echo csrf_token() ?>';
		var csrfHash = '<?php echo csrf_hash() ?>';
	</script>
	<input type="hidden" id="csrf_sandraPrincipal" name="csrf_sandraPrincipal" value="<?php echo csrf_hash() ?>">


</head>

<body>

	<div>
		<form>
			<input type="hidden" id="<?php echo csrf_token() ?>ativarLeitura" name="<?php echo csrf_token() ?>" value="<?php echo csrf_hash() ?>">

			<input type='text' id="input"></input>
			<button type="button" id="button">Ativar Leitura</button>
		</form>
	</div>

	<audio hidden id="anuncio" controls>
		<source controls="true" autoplay="autoplay" loop="true" muted defaultmuted playsinline src="<?php echo base_url('/imagens/anuncio.mp3') ?>" type="audio/mpeg">
	</audio>


	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
				</div>
				<div style="padding-left:0; padding-right:0;padding-top:0;padding-bottom:0" class="card-body">

					<div class="col-md-12">
						<div class="card" style="background:#80808082;transition: all 0.15s ease 0s; height: inherit; width: inherit;">

							<div class="col-md-12">
								<div style="padding-left:0; padding-right:0;padding-top:0;padding-bottom:0" class="card-body">
									<style>
										.carousel .carousel-item {
											transition-duration: 3s;
										}
									</style>
									<div id="slideShow" class="carousel slide" data-ride="carousel" data-interval="15000" data-pause="hover">

										<div class="carousel-inner">
											<div class="carousel-item active">

												<div style=" padding-left:0; padding-right:0;padding-top:0;padding-bottom:0" class="card-body">

													<div class="row">
														<div class="col-md-2">
														</div>
														<div class="col-md-8">
															<div style="margin-bottom:30px;height:40px; font-size:30px" class="align-middle font-weight-bold text-center">
																<?php echo $tituloPainel ?>
															</div>
														</div>
														<div class="col-md-2">
															<div class="align-right">
																<a style="width:100px" href="#" onclick="filtrarPainelSenhas()"><i class="fas fa-filter"></i> </a>
															</div>
														</div>

													</div>

													<div class="row">
														<div class="col-lg-6">
															<div class="card">
																<div class="card-header border-0">
																	<div class="d-flex justify-content-between">
																		<h1>Próximas Chamadas</h1>
																	</div>
																</div>
																<div class="card-body">
																	<table style="font-size:25px !important" id="data_tableProximasChamadas" class="table table-striped table-hover table-sm">
																		<thead>
																			<tr>
																				<th>Senha</th>
																				<th>Paciente</th>
																				<th>Hora</th>
																			</tr>
																		</thead>
																	</table>
																</div>
															</div>

														</div>

														<div class="col-lg-6">
															<div style="background:red; color:#fff" class="card">
																<div class="card-header border-0">
																	<div class="d-flex justify-content-between">
																		<h1>Últimas Chamadas</h1>
																	</div>
																</div>
																<div  class="card-body">
																	<table style="font-size:25px !important" id="data_tableUltimasChamadas" class="table table-striped table-hover table-sm">
																		<thead>
																			<tr>
																				<th>Senha</th>
																				<th>Paciente</th>
																				<th>Hora</th>
																				<th>Qtd Chamadas</th>
																			</tr>
																		</thead>
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

							</div>

						</div>
					</div>
				</div>

			</div>
			<a class="carousel-control-prev" href="#slideShow" role="button" data-slide="prev">
				<span class="carousel-control-custom-icon" aria-hidden="true">
					<i class="fas fa-chevron-left"></i>
				</span>
				<span class="sr-only">Anterior</span>
			</a>
			<a class="carousel-control-next" href="#slideShow" role="button" data-slide="next">
				<span class="carousel-control-custom-icon" aria-hidden="true">
					<i class="fas fa-chevron-right"></i>
				</span>
				<span class="sr-only">Próximo</span>
			</a>
		</div>

	</section>

	<style>
		.modal-backdrop {
			opacity: 0.8 !important;
		}
	</style>
	<div id="pacienteChamadoModal" style="position: fixed; height: 1000px !important;top: 50%;  transform: translateY(-50%);" class="modal fade" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div style="height: 1000px !important;opacity: 0.8 !important;background:red;color:#fff" class="modal-content">

				<div class="modal-body ">
					<div style="font-size:40px;  position: relative; top: 50%;  transform: translateY(-50%);" class="text-center" id="pacienteChamado">
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="filtrarPainelSenhas" class="modal fade" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">

				<style>
					.select2-container--default .select2-selection--multiple .select2-selection__choice {
						background-color: blue;
						border: 1px solid #aaa;
					}
				</style>
				<div class="modal-body ">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="codDepartamento"> Departamento: <span class="text-danger">*</span> </label>
								<form action="" method="get">
									<input type="hidden" id="<?php echo csrf_token() ?>filtrarPainelSenhas" name="<?php echo csrf_token() ?>" value="<?php echo csrf_hash() ?>">

									<select id="codDepartamento" name="codDepartamento[]" class="select2" multiple="multiple" data-placeholder="Selecione um ou mais" style="width: 100%;">

									</select>
									<button type="submit"> Gravar
									</button>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>




</body>


<!-- jQuery -->
<script src="<?php echo base_url() ?>/assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>/assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?php echo base_url() ?>/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->


<script src="<?php echo base_url() ?>/assets/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?php echo base_url() ?>/assets/adminlte/plugins/chart.js/Chart-3.6.2.min.js"></script>
<script src="<?php echo base_url() ?>/assets/adminlte/plugins/chartjs-plugin-datalabels-2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>


<!-- DATATABLES -->
<script src="<?php echo base_url() ?>/assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>/assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>/assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/adminlte/plugins/select2/js/select2.full.min.js"></script>



<script>
	var Departamentos = '<?php echo $codDepartamento ?>';

	$(function() {


		$('#data_tableProximasChamadas').DataTable({

			"bDestroy": true,
			"paging": false,
			"deferRender": true,
			"lengthChange": false,
			"searching": false,
			"ordering": false,
			"info": false,
			"autoWidth": false,
			"responsive": true,
			"ajax": {
				"url": '<?php echo base_url('PainelSenhas/PainelSenhasProximasChamadas') ?>',
				"type": "POST",
				"dataType": "json",
				async: "true",
				data: {
					Departamentos: Departamentos,
					csrf_sandra: $("#csrf_sandraPrincipal").val(),
				}
			}
		})


		$('#data_tableUltimasChamadas').DataTable({

			"bDestroy": true,
			"paging": false,
			"deferRender": true,
			"lengthChange": false,
			"searching": false,
			"ordering": false,
			"info": false,
			"autoWidth": false,
			"responsive": true,
			"ajax": {
				"url": '<?php echo base_url('PainelSenhas/PainelSenhaUltimasChamadas') ?>',
				"type": "POST",
				"dataType": "json",
				async: "true",
				data: {
					Departamentos: Departamentos,
					csrf_sandra: $("#csrf_sandraPrincipal").val(),
				}
			}
		})





		$('#data_tableFilaPrioridadesResultados').DataTable({

			"bDestroy": true,
			"paging": false,
			"deferRender": true,
			"lengthChange": false,
			"searching": false,
			"ordering": false,
			"info": false,
			"autoWidth": false,
			"responsive": true,
			"ajax": {
				"url": '<?php echo base_url('PainelSenhas/PainelSenhasFilaPrioridadesResultados') ?>',
				"type": "POST",
				"dataType": "json",
				async: "true",
				data: {
					Departamentos: Departamentos,
					csrf_sandra: $("#csrf_sandraPrincipal").val(),
				}
			}
		})


		$('#data_tableFilaNormalResultados').DataTable({

			"bDestroy": true,
			"paging": false,
			"deferRender": true,
			"lengthChange": false,
			"searching": false,
			"ordering": false,
			"info": false,
			"autoWidth": false,
			"responsive": true,
			"ajax": {
				"url": '<?php echo base_url('PainelSenhas/PainelSenhasFilaNormalResultados') ?>',
				"type": "POST",
				"dataType": "json",
				async: "true",
				data: {
					Departamentos: Departamentos,
					csrf_sandra: $("#csrf_sandraPrincipal").val(),
				}
			}
		})



	});



	$.ajax({
		url: '<?php echo base_url('PainelSenhas/listaDropDownDepartamentos') ?>',
		type: 'post',
		dataType: 'json',
		data: {
			csrf_sandra: $("#csrf_sandraPrincipal").val(),
		},
		success: function(Departamentos) {

			$("#codDepartamento").select2({
				data: Departamentos,
			})

			$('#codDepartamento').val(null); // Select the option with a value of '1'
			$('#codDepartamento').trigger('change');
$(document).on('select2:open', () => {
					document.querySelector('.select2-search__field').focus();
				});

		}
	})




	function filtrarPainelSenhas() {

		$('#filtrarPainelSenhas').modal('show');

	}


	function atualizaTela() {
		$.fn.dataTable.ext.errMode = 'none';
		$('#data_tableProximasChamadas').DataTable().ajax.reload(null, false).draw(false);
		$('#data_tableUltimasChamadas').DataTable().ajax.reload(null, false).draw(false);

		$('#data_tableFilaPrioridadesResultados').DataTable().ajax.reload(null, false).draw(false);
		$('#data_tableFilaNormalResultados').DataTable().ajax.reload(null, false).draw(false);


	}





	function verificaChamadas(Departamentos) {

		button.addEventListener('click', () => {
			if ('speechSynthesis' in window) {
				const to_speak = new SpeechSynthesisUtterance('');
				speechSynthesis.cancel();
				speechSynthesis.speak(to_speak);
			}
		});
		document.getElementById("button").click();



		$.ajax({
			url: '<?php echo base_url('PainelSenhas/verificaChamadas') ?>',
			type: 'post',
			dataType: 'json',
			data: {
				Departamentos: Departamentos,
				csrf_sandra: $("#csrf_sandraPrincipal").val(),
			},
			success: function(verificaChamadas) {

				if (verificaChamadas.success === true) {


					$('#pacienteChamadoModal').modal('show');

					document.getElementById('pacienteChamado').innerHTML = verificaChamadas.pacienteModal;


					var x = document.getElementById("anuncio");
					x.play();

					textToSpeach(verificaChamadas.textoLeitura);

				} else {

					$('#pacienteChamadoModal').modal('hide');

				}


			}
		})
	}

	verificaChamadas(Departamentos);


	function textToSpeach(message) {
		const speach = new SpeechSynthesisUtterance(message);
		speach.volume = 1;
		speach.rate = 1;
		speach.lang = 'pt-BR';
		[speach.voice] = speechSynthesis.getVoices();

		speechSynthesis.speak(speach);
	}




	setInterval(function() {
		atualizaTela();
		verificaChamadas(Departamentos);
	}, 10000);
</script>