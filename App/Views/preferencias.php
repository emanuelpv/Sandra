<?php
//É NECESSÁRIO EM TODAS AS VIEWS

$codOrganizacao = session()->codOrganizacao;


if (session()->mensagem_sucesso !== NULL) {
	alerta(session()->mensagem_sucesso, 'success');
}
if (session()->mensagem_erro !== NULL) {
	alerta(session()->mensagem_erro, 'error');
}
if (session()->mensagem_informacao !== NULL) {
	alerta(session()->mensagem_informacao, 'info');
}
if (session()->mensagem_alerta !== NULL) {
	alerta(session()->mensagem_alerta, 'warning');
}
?>
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
			  	<div class="col-md-8 mt-2">
				  <h3 style="font-size:30px;font-weight: bold;" class="card-title">Preferências</h3>
			  	</div>
				<div class="col-md-4">
				  <button type="button" class="btn btn-block btn-primary" data-toggle="tooltip" data-placement="top" title="Adicionar" onclick="addpreferencias()" title="Adicionar"> <i class="fa fa-plus"></i> Adicionar</button>
				</div>
			  </div>			  
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="data_tablepreferencias" class="table table-striped table-hover table-sm">
                <thead>
                <tr>
					<th>codPreferencia</th>
					<th>CodPessoa</th>
					<th>CategoriasSolicitacoes</th>
					<th>StatusSolicitacoes</th>
					<th>PeriodoSolicitacoes</th>
					<th>AutorPreferencia</th>

					<th></th>
                </tr>
                </thead>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
	<!-- Add modal content -->
	<div id="add-modalpreferencias" class="modal fade" role="dialog"
		aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
			<div class="modal-header bg-primary text-center p-3">
				<h4 class="modal-title text-white" id="info-header-modalLabel">Adicionar Preferências</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
				<div class="modal-body">
					<form id="add-formpreferencias" class="pl-3 pr-3">								
                        <div class="row">
 							<input type="hidden" id="codPreferencia" name="codPreferencia" class="form-control" placeholder="codPreferencia" maxlength="11" required>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="codPessoa"> CodPessoa: <span class="text-danger">*</span> </label>
									<input type="number" id="codPessoa" name="codPessoa" class="form-control" placeholder="CodPessoa" maxlength="11" number="true" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="categoriasSolicitacoes"> CategoriasSolicitacoes: <span class="text-danger">*</span> </label>
									<input type="text" id="categoriasSolicitacoes" name="categoriasSolicitacoes" class="form-control" placeholder="CategoriasSolicitacoes" maxlength="30" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="statusSolicitacoes"> StatusSolicitacoes: <span class="text-danger">*</span> </label>
									<input type="text" id="statusSolicitacoes" name="statusSolicitacoes" class="form-control" placeholder="StatusSolicitacoes" maxlength="30" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="periodoSolicitacoes"> PeriodoSolicitacoes: <span class="text-danger">*</span> </label>
									<input type="number" id="periodoSolicitacoes" name="periodoSolicitacoes" class="form-control" placeholder="PeriodoSolicitacoes" maxlength="11" number="true" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="autorPreferencia"> AutorPreferencia: <span class="text-danger">*</span> </label>
									<input type="number" id="autorPreferencia" name="autorPreferencia" class="form-control" placeholder="AutorPreferencia" maxlength="11" number="true" required>
								</div>
							</div>
						</div>
																				
						<div class="form-group text-center">
							<div class="btn-group">
								<button type="submit" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Adicionar" id="add-formpreferencias-btn">Adicionar</button>
								<button type="button" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Fechar" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->	

	<!-- Add modal content -->				
	<div id="edit-modalpreferencias" class="modal fade" role="dialog"
		aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
			<div class="modal-header bg-primary text-center p-3">
				<h4 class="modal-title text-white" id="info-header-modalLabel">Atualizar Preferências</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
				<div class="modal-body">
					<form id="edit-formpreferencias" class="pl-3 pr-3">
                        <div class="row">
 							<input type="hidden" id="codPreferencia" name="codPreferencia" class="form-control" placeholder="codPreferencia" maxlength="11" required>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="codPessoa"> CodPessoa: <span class="text-danger">*</span> </label>
									<input type="number" id="codPessoa" name="codPessoa" class="form-control" placeholder="CodPessoa" maxlength="11" number="true" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="categoriasSolicitacoes"> CategoriasSolicitacoes: <span class="text-danger">*</span> </label>
									<input type="text" id="categoriasSolicitacoes" name="categoriasSolicitacoes" class="form-control" placeholder="CategoriasSolicitacoes" maxlength="30" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="statusSolicitacoes"> StatusSolicitacoes: <span class="text-danger">*</span> </label>
									<input type="text" id="statusSolicitacoes" name="statusSolicitacoes" class="form-control" placeholder="StatusSolicitacoes" maxlength="30" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="periodoSolicitacoes"> PeriodoSolicitacoes: <span class="text-danger">*</span> </label>
									<input type="number" id="periodoSolicitacoes" name="periodoSolicitacoes" class="form-control" placeholder="PeriodoSolicitacoes" maxlength="11" number="true" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="autorPreferencia"> AutorPreferencia: <span class="text-danger">*</span> </label>
									<input type="number" id="autorPreferencia" name="autorPreferencia" class="form-control" placeholder="AutorPreferencia" maxlength="11" number="true" required>
								</div>
							</div>
						</div>
											
						<div class="form-group text-center">
							<div class="btn-group">
								<button type="submit" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Salvar" id="edit-formpreferencias-btn">Salvar</button>
								<button type="button" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Fechar" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</form>

				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->			


  <?php 
      echo view('tema/rodape');	
    ?>
<script>
$(function () {
	$('#data_tablepreferencias').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"ajax": {
			"url": '<?php echo base_url('preferencias/getAll') ?>',			
			"type": "POST",
			"dataType": "json",
			async: "true"
		}	  
	});
});
function addpreferencias() {
	// reset the form 
	$("#add-formpreferencias")[0].reset();
	$(".form-control").removeClass('is-invalid').removeClass('is-valid');		
	$('#add-modalpreferencias').modal('show');
	// submit the add from 
	$.validator.setDefaults({
		highlight: function(element) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		},
		unhighlight: function(element) {
			$(element).removeClass('is-invalid').addClass('is-valid');
		},
		errorElement: 'div ',
		errorClass: 'invalid-feedback',
		errorPlacement: function(error, element) {
			if (element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else if ($(element).is('.select')) {
				element.next().after(error);
			} else if (element.hasClass('select2')) {
				//error.insertAfter(element);
				error.insertAfter(element.next());
			} else if (element.hasClass('selectpicker')) {
				error.insertAfter(element.next());
			} else {
				error.insertAfter(element);
			}
		},

		submitHandler: function(form) {
			
			var form = $('#add-formpreferencias');
			// remove the text-danger
			$(".text-danger").remove();

			$.ajax({
				url: '<?php echo base_url('preferencias/add') ?>',						
				type: 'post',
				data: form.serialize(), // /converting the form data into array and sending it to server
				dataType: 'json',
				beforeSend: function() {
					//$('#add-formpreferencias-btn').html('<i class="fa fa-spinner fa-spin"></i>');
				},					
				success: function(response) {

					if (response.success === true) {

						Swal.fire({
							position: 'bottom-end',
							icon: 'success',
							title: response.messages,
							showConfirmButton: false,
							timer: 1500
						}).then(function() {
							$('#data_tablepreferencias').DataTable().ajax.reload(null, false).draw(false);
							$('#add-modalpreferencias').modal('hide');
						})

					} else {

						if (response.messages instanceof Object) {
							$.each(response.messages, function(index, value) {
								var id = $("#" + index);

								id.closest('.form-control')
									.removeClass('is-invalid')
									.removeClass('is-valid')
									.addClass(value.length > 0 ? 'is-invalid' : 'is-valid');

								id.after(value);

							});
						} else {
							Swal.fire({
								position: 'bottom-end',
								icon: 'error',
								title: response.messages,
								showConfirmButton: false,
								timer: 1500
							})

						}
					}
					$('#add-formpreferencias-btn').html('Adicionar');
				}
			});

			return false;
		}
	});
	$('#add-formpreferencias').validate();
}

function editpreferencias(codPreferencia) {
	$.ajax({
		url: '<?php echo base_url('preferencias/getOne') ?>',
		type: 'post',
		data: {
			codPreferencia: codPreferencia
		},
		dataType: 'json',
		success: function(response) {
			// reset the form 
			$("#edit-formpreferencias")[0].reset();
			$(".form-control").removeClass('is-invalid').removeClass('is-valid');				
			$('#edit-modalpreferencias').modal('show');	

			$("#edit-formpreferencias #codPreferencia").val(response.codPreferencia);
			$("#edit-formpreferencias #codPessoa").val(response.codPessoa);
			$("#edit-formpreferencias #categoriasSolicitacoes").val(response.categoriasSolicitacoes);
			$("#edit-formpreferencias #statusSolicitacoes").val(response.statusSolicitacoes);
			$("#edit-formpreferencias #periodoSolicitacoes").val(response.periodoSolicitacoes);
			$("#edit-formpreferencias #autorPreferencia").val(response.autorPreferencia);

			// submit the edit from 
			$.validator.setDefaults({
				highlight: function(element) {
					$(element).addClass('is-invalid').removeClass('is-valid');
				},
				unhighlight: function(element) {
					$(element).removeClass('is-invalid').addClass('is-valid');
				},
				errorElement: 'div ',
				errorClass: 'invalid-feedback',
				errorPlacement: function(error, element) {
					if (element.parent('.input-group').length) {
						error.insertAfter(element.parent());
					} else if ($(element).is('.select')) {
						element.next().after(error);
					} else if (element.hasClass('select2')) {
						//error.insertAfter(element);
						error.insertAfter(element.next());
					} else if (element.hasClass('selectpicker')) {
						error.insertAfter(element.next());
					} else {
						error.insertAfter(element);
					}
				},

				submitHandler: function(form) {
					var form = $('#edit-formpreferencias');
					$(".text-danger").remove();
					$.ajax({
						url: '<?php echo base_url('preferencias/edit') ?>' ,						
						type: 'post',
						data: form.serialize(), 
						dataType: 'json',
						beforeSend: function() {
							//$('#edit-formpreferencias-btn').html('<i class="fa fa-spinner fa-spin"></i>');
						},								
						success: function(response) {

							if (response.success === true) {

								Swal.fire({
									position: 'bottom-end',
									icon: 'success',
									title: response.messages,
									showConfirmButton: false,
									timer: 1500
								}).then(function() {
									$('#data_tablepreferencias').DataTable().ajax.reload(null, false).draw(false);
									$('#edit-modalpreferencias').modal('hide');
								})
								
							} else {

								if (response.messages instanceof Object) {
									$.each(response.messages, function(index, value) {
										var id = $("#" + index);

										id.closest('.form-control')
											.removeClass('is-invalid')
											.removeClass('is-valid')
											.addClass(value.length > 0 ? 'is-invalid' : 'is-valid');

										id.after(value);

									});
								} else {
									Swal.fire({
										position: 'bottom-end',
										icon: 'error',
										title: response.messages,
										showConfirmButton: false,
										timer: 1500
									})

								}
							}
							$('#edit-formpreferencias-btn').html('Salvar');
						}
					});

					return false;
				}
			});
			$('#edit-formpreferencias').validate();

		}
	});
}	

function removepreferencias(codPreferencia) {	
	Swal.fire({
	  title: 'Você tem certeza que deseja remover?',
	  text: "Você não poderá reverter após a confirmação",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Confirmar',
	  cancelButtonText: 'Cancelar'		  
	}).then((result) => {		

	  if (result.value) {
		$.ajax({
			url: '<?php echo base_url('preferencias/remove') ?>',
			type: 'post',
			data: {
				codPreferencia: codPreferencia
			},
			dataType: 'json',
			success: function(response) {

				if (response.success === true) {
					Swal.fire({
						position: 'bottom-end',
						icon: 'success',
						title: response.messages,
						showConfirmButton: false,
						timer: 1500
					}).then(function() {
						$('#data_tablepreferencias').DataTable().ajax.reload(null, false).draw(false);								
					})
				} else {
					Swal.fire({
						position: 'bottom-end',
						icon: 'error',
						title: response.messages,
						showConfirmButton: false,
						timer: 1500
					})

					
				}
			}
		});
	  }
	})		
}  
</script>
