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
				  <h3 style="font-size:30px;font-weight: bold;" class="card-title">Suspensao de Medicamentos</h3>
			  	</div>
				<div class="col-md-4">
				  <button type="button" class="btn btn-block btn-primary" data-toggle="tooltip" data-placement="top" title="Adicionar" onclick="addsuspensaoMedicamentos()" title="Adicionar">Adicionar</button>
				</div>
			  </div>			  
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="data_tablesuspensaoMedicamentos" class="table table-striped table-hover table-sm">
                <thead>
                <tr>
					<th>Código</th>
					<th>CodPrescricaoMedicamento</th>
					<th>CodMedicamento</th>
					<th>CodAtendimento</th>
					<th>CodAutor</th>
					<th>Motivo</th>
					<th>QtdDevolucao</th>
					<th>DataCriacao</th>

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
	<div id="suspensaoMedicamentosAddModal" class="modal fade" role="dialog"
		aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
			<div class="modal-header bg-primary text-center p-3">
				<h4 class="modal-title text-white" id="info-header-modalLabel">Adicionar Suspensao de Medicamentos</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
				<div class="modal-body">
					<form id="suspensaoMedicamentosAddForm" class="pl-3 pr-3">
						<input type="hidden" id="<?php echo csrf_token() ?>suspensaoMedicamentosAddForm" name="<?php echo csrf_token() ?>" value="<?php echo csrf_hash() ?>">
					
                        <div class="row">
 							<input type="hidden" id="codSuspensaoMedicamento" name="codSuspensaoMedicamento" class="form-control" placeholder="Código" maxlength="11" required>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="codPrescricaoMedicamento"> CodPrescricaoMedicamento: </label>
									<input type="number" id="codPrescricaoMedicamento" name="codPrescricaoMedicamento" class="form-control" placeholder="CodPrescricaoMedicamento" maxlength="11" number="true" >
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="codMedicamento"> CodMedicamento: <span class="text-danger">*</span> </label>
									<input type="number" id="codMedicamento" name="codMedicamento" class="form-control" placeholder="CodMedicamento" maxlength="11" number="true" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="codAtendimento"> CodAtendimento: <span class="text-danger">*</span> </label>
									<input type="number" id="codAtendimento" name="codAtendimento" class="form-control" placeholder="CodAtendimento" maxlength="11" number="true" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="codAutor"> CodAutor: <span class="text-danger">*</span> </label>
									<input type="number" id="codAutor" name="codAutor" class="form-control" placeholder="CodAutor" maxlength="11" number="true" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="motivo"> Motivo: <span class="text-danger">*</span> </label>
									<textarea cols="40" rows="5" id="motivo" name="motivo" class="form-control" placeholder="Motivo" required></textarea>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="qtdDevolucao"> QtdDevolucao: <span class="text-danger">*</span> </label>
									<input type="number" id="qtdDevolucao" name="qtdDevolucao" class="form-control" placeholder="QtdDevolucao" maxlength="11" number="true" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="dataCriacao"> DataCriacao: <span class="text-danger">*</span> </label>
									<input type="text" id="dataCriacao" name="dataCriacao" class="form-control" placeholder="DataCriacao" required>
								</div>
							</div>
						</div>
																				
						<div class="form-group text-center">
							<div class="btn-group">
								<button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Adicionar" id="suspensaoMedicamentosAddForm-btn">Adicionar</button>
								<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Fechar" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->	

	<!-- Add modal content -->				
	<div id="suspensaoMedicamentosEditModal" class="modal fade" role="dialog"
		aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
			<div class="modal-header bg-primary text-center p-3">
				<h4 class="modal-title text-white" id="info-header-modalLabel">Atualizar Suspensao de Medicamentos</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
				<div class="modal-body">
					<form id="suspensaoMedicamentosEditForm" class="pl-3 pr-3">
						<input type="hidden" id="<?php echo csrf_token() ?>suspensaoMedicamentosEditForm" name="<?php echo csrf_token() ?>" value="<?php echo csrf_hash() ?>">

                        <div class="row">
 							<input type="hidden" id="codSuspensaoMedicamento" name="codSuspensaoMedicamento" class="form-control" placeholder="Código" maxlength="11" required>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="codPrescricaoMedicamento"> CodPrescricaoMedicamento: </label>
									<input type="number" id="codPrescricaoMedicamento" name="codPrescricaoMedicamento" class="form-control" placeholder="CodPrescricaoMedicamento" maxlength="11" number="true" >
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="codMedicamento"> CodMedicamento: <span class="text-danger">*</span> </label>
									<input type="number" id="codMedicamento" name="codMedicamento" class="form-control" placeholder="CodMedicamento" maxlength="11" number="true" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="codAtendimento"> CodAtendimento: <span class="text-danger">*</span> </label>
									<input type="number" id="codAtendimento" name="codAtendimento" class="form-control" placeholder="CodAtendimento" maxlength="11" number="true" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="codAutor"> CodAutor: <span class="text-danger">*</span> </label>
									<input type="number" id="codAutor" name="codAutor" class="form-control" placeholder="CodAutor" maxlength="11" number="true" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="motivo"> Motivo: <span class="text-danger">*</span> </label>
									<textarea cols="40" rows="5" id="motivo" name="motivo" class="form-control" placeholder="Motivo" required></textarea>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="qtdDevolucao"> QtdDevolucao: <span class="text-danger">*</span> </label>
									<input type="number" id="qtdDevolucao" name="qtdDevolucao" class="form-control" placeholder="QtdDevolucao" maxlength="11" number="true" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="dataCriacao"> DataCriacao: <span class="text-danger">*</span> </label>
									<input type="text" id="dataCriacao" name="dataCriacao" class="form-control" placeholder="DataCriacao" required>
								</div>
							</div>
						</div>
											
						<div class="form-group text-center">
							<div class="btn-group">
								<button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Salvar" id="suspensaoMedicamentosEditForm-btn">Salvar</button>
								<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Fechar" data-dismiss="modal">Fechar</button>
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

	$(document).on('show.bs.modal', '.modal', function() {
		var zIndex = 1040 + (10 * $('.modal:visible').length);
		$(this).css('z-index', zIndex);
		setTimeout(function() {
			$('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
		}, 0);
	});
	
$(function () {
	$('#data_tablesuspensaoMedicamentos').DataTable({
		"paging": true,
		"deferRender": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"ajax": {
			"url": '<?php echo base_url('suspensaoMedicamentos/getAll') ?>',			
			"type": "POST",
			"dataType": "json",
			async: "true",
			data: {
				csrf_sandra: $("#csrf_sandraPrincipal").val(),
			},
		}	  
	});
});
function addsuspensaoMedicamentos() {
	// reset the form 
	$("#suspensaoMedicamentosAddForm")[0].reset();
	$(".form-control").removeClass('is-invalid').removeClass('is-valid');		
	$('#suspensaoMedicamentosAddModal').modal('show');
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
			
			var form = $('#suspensaoMedicamentosAddForm');
			// remove the text-danger
			$(".text-danger").remove();

			$.ajax({
				url: '<?php echo base_url('suspensaoMedicamentos/add') ?>',						
				type: 'post',
				data: form.serialize(), // /converting the form data into array and sending it to server
				dataType: 'json',
				beforeSend: function() {
					//$('#suspensaoMedicamentosAddForm-btn').html('<i class="fa fa-spinner fa-spin"></i>');
				},					
				success: function(response) {

					if (response.success === true) {
							$('#suspensaoMedicamentosAddModal').modal('hide');

						var Toast = Swal.mixin({
										toast: true,
										position: 'bottom-end',
										showConfirmButton: false,
										timer: 2000
									});
									Toast.fire({
										icon: 'success',
										title: response.messages
						}).then(function() {
							$('#data_tablesuspensaoMedicamentos').DataTable().ajax.reload(null, false).draw(false);
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
													
							var Toast = Swal.mixin({
										toast: true,
										position: 'bottom-end',
										showConfirmButton: false,
										timer: 2000
									});
									Toast.fire({
										icon: 'error',
										title: response.messages
						})

						}
					}
					$('#suspensaoMedicamentosAddForm-btn').html('Adicionar');
				}
			});

			return false;
		}
	});
	$('#suspensaoMedicamentosAddForm').validate();
}

function editsuspensaoMedicamentos(codSuspensaoMedicamento) {
	$.ajax({
		url: '<?php echo base_url('suspensaoMedicamentos/getOne') ?>',
		type: 'post',
		data: {
			codSuspensaoMedicamento: codSuspensaoMedicamento,
			csrf_sandra: $("#csrf_sandraPrincipal").val(),
		},
		dataType: 'json',
		success: function(response) {
			// reset the form 
			$("#suspensaoMedicamentosEditForm")[0].reset();
			$(".form-control").removeClass('is-invalid').removeClass('is-valid');				
			$('#suspensaoMedicamentosEditModal').modal('show');	

			$("#suspensaoMedicamentosEditForm #codSuspensaoMedicamento").val(response.codSuspensaoMedicamento);
			$("#suspensaoMedicamentosEditForm #codPrescricaoMedicamento").val(response.codPrescricaoMedicamento);
			$("#suspensaoMedicamentosEditForm #codMedicamento").val(response.codMedicamento);
			$("#suspensaoMedicamentosEditForm #codAtendimento").val(response.codAtendimento);
			$("#suspensaoMedicamentosEditForm #codAutor").val(response.codAutor);
			$("#suspensaoMedicamentosEditForm #motivo").val(response.motivo);
			$("#suspensaoMedicamentosEditForm #qtdDevolucao").val(response.qtdDevolucao);
			$("#suspensaoMedicamentosEditForm #dataCriacao").val(response.dataCriacao);

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
					var form = $('#suspensaoMedicamentosEditForm');
					$(".text-danger").remove();
					$.ajax({
						url: '<?php echo base_url('suspensaoMedicamentos/edit') ?>' ,						
						type: 'post',
						data: form.serialize(), 
						dataType: 'json',
						beforeSend: function() {
							//$('#suspensaoMedicamentosEditForm-btn').html('<i class="fa fa-spinner fa-spin"></i>');
						},								
						success: function(response) {

							if (response.success === true) {
								
									$('#suspensaoMedicamentosEditModal').modal('hide');

								
								var Toast = Swal.mixin({
										toast: true,
										position: 'bottom-end',
										showConfirmButton: false,
										timer: 2000
									});
									Toast.fire({
										icon: 'success',
										title: response.messages
								}).then(function() {
									$('#data_tablesuspensaoMedicamentos').DataTable().ajax.reload(null, false).draw(false);
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
									var Toast = Swal.mixin({
										toast: true,
										position: 'bottom-end',
										showConfirmButton: false,
										timer: 2000
									});
									Toast.fire({
										icon: 'error',
										title: response.messages
						})

								}
							}
							$('#suspensaoMedicamentosEditForm-btn').html('Salvar');
						}
					});

					return false;
				}
			});
			$('#suspensaoMedicamentosEditForm').validate();

		}
	});
}	

function removesuspensaoMedicamentos(codSuspensaoMedicamento) {	
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
			url: '<?php echo base_url('suspensaoMedicamentos/remove') ?>',
			type: 'post',
			data: {
				codSuspensaoMedicamento: codSuspensaoMedicamento,
				csrf_sandra: $("#csrf_sandraPrincipal").val(),
			},
			dataType: 'json',
			success: function(response) {

				if (response.success === true) {
					var Toast = Swal.mixin({
										toast: true,
										position: 'bottom-end',
										showConfirmButton: false,
										timer: 2000
									});
									Toast.fire({
										icon: 'success',
										title: response.messages
					}).then(function() {
						$('#data_tablesuspensaoMedicamentos').DataTable().ajax.reload(null, false).draw(false);								
					})
				} else {
					var Toast = Swal.mixin({
										toast: true,
										position: 'bottom-end',
										showConfirmButton: false,
										timer: 2000
									});
									Toast.fire({
										icon: 'error',
										title: response.messages
						})

					
				}
			}
		});
	  }
	})		
}  
</script>
