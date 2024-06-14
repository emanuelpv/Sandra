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
							<h3 style="font-size:30px;font-weight: bold;" class="card-title">Dependências dos Departamentos</h3>
						</div>
						<div class="col-md-4">
							<button type="button" class="btn btn-block btn-primary" data-toggle="tooltip" data-placement="top" title="Adicionar" onclick="addatendimentoslocais()" title="Adicionar"> <i class="fa fa-plus"></i> Adicionar</button>
						</div>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="data_tableatendimentoslocais" class="table table-striped table-hover table-sm">
						<thead>
							<tr>
								<th>codLocalAtendimento</th>
								<th>DescricaoLocalAtendimento</th>
								<th>CodTipoDependecia</th>
								<th>CodStatusDependecia</th>
								<th>CodPessoa</th>
								<th>DataAtualizacao</th>

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
<div id="atendimentoslocaisAddModal" class="modal fade" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header bg-primary text-center p-3">
				<h4 class="modal-title text-white" id="info-header-modalLabel">Adicionar Dependências dos Departamentos</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="atendimentoslocaisAddForm" class="pl-3 pr-3">
					<div class="row">
						<input type="hidden" id="codLocalAtendimento" name="codLocalAtendimento" class="form-control" placeholder="codLocalAtendimento" maxlength="11" required>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="descricaoLocalAtendimento"> DescricaoLocalAtendimento: <span class="text-danger">*</span> </label>
								<input type="text" id="descricaoLocalAtendimento" name="descricaoLocalAtendimento" class="form-control" placeholder="DescricaoLocalAtendimento" maxlength="100" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="codTipoLocalAtendimento"> CodTipoDependecia: <span class="text-danger">*</span> </label>
								<select id="codTipoLocalAtendimento" name="codTipoLocalAtendimento" class="custom-select" required>
									<option value="0"></option>
									<option value="1">select1</option>
									<option value="2">select2</option>
									<option value="3">select3</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="codStatusLocalAtendimento"> CodStatusDependecia: <span class="text-danger">*</span> </label>
								<select id="codStatusLocalAtendimento" name="codStatusLocalAtendimento" class="custom-select" required>
									<option value="0"></option>
									<option value="1">select1</option>
									<option value="2">select2</option>
									<option value="3">select3</option>
								</select>
							</div>
						</div>
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
								<label for="dataAtualizacao"> DataAtualizacao: <span class="text-danger">*</span> </label>
								<input type="text" id="dataAtualizacao" name="dataAtualizacao" class="form-control" placeholder="DataAtualizacao" required>
							</div>
						</div>
					</div>

					<div class="form-group text-center">
						<div class="btn-group">
							<button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Adicionar" id="atendimentoslocaisAddForm-btn">Adicionar</button>
							<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Fechar" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Add modal content -->
<div id="atendimentoslocaisEditModal" class="modal fade" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header bg-primary text-center p-3">
				<h4 class="modal-title text-white" id="info-header-modalLabel">Atualizar Dependências dos Departamentos</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="atendimentoslocaisEditForm" class="pl-3 pr-3">
					<div class="row">
						<input type="hidden" id="codLocalAtendimento" name="codLocalAtendimento" class="form-control" placeholder="codLocalAtendimento" maxlength="11" required>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="descricaoLocalAtendimento"> DescricaoLocalAtendimento: <span class="text-danger">*</span> </label>
								<input type="text" id="descricaoLocalAtendimento" name="descricaoLocalAtendimento" class="form-control" placeholder="DescricaoLocalAtendimento" maxlength="100" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="codTipoLocalAtendimento"> CodTipoDependecia: <span class="text-danger">*</span> </label>
								<select id="codTipoLocalAtendimento" name="codTipoLocalAtendimento" class="custom-select" required>
									<option value="0"></option>
									<option value="1">select1</option>
									<option value="2">select2</option>
									<option value="3">select3</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="codStatusLocalAtendimento"> CodStatusDependecia: <span class="text-danger">*</span> </label>
								<select id="codStatusLocalAtendimento" name="codStatusLocalAtendimento" class="custom-select" required>
									<option value="0"></option>
									<option value="1">select1</option>
									<option value="2">select2</option>
									<option value="3">select3</option>
								</select>
							</div>
						</div>
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
								<label for="dataAtualizacao"> DataAtualizacao: <span class="text-danger">*</span> </label>
								<input type="text" id="dataAtualizacao" name="dataAtualizacao" class="form-control" placeholder="DataAtualizacao" required>
							</div>
						</div>
					</div>

					<div class="form-group text-center">
						<div class="btn-group">
							<button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Salvar" id="atendimentoslocaisEditForm-btn">Salvar</button>
							<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Fechar" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</form>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /.content -->
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

	$(function() {
		$('#data_tableatendimentoslocais').DataTable({
			"paging": true,
			"deferRender": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			"ajax": {
				"url": '<?php echo base_url('atendimentosLocais/getAll') ?>',
				"type": "POST",
				"dataType": "json",
				async: "true"
			}
		});
	});

	function addatendimentoslocais() {
		// reset the form 
		$("#atendimentoslocaisAddForm")[0].reset();
		$(".form-control").removeClass('is-invalid').removeClass('is-valid');
		$('#atendimentoslocaisAddModal').modal('show');
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

				var form = $('#atendimentoslocaisAddForm');
				// remove the text-danger
				$(".text-danger").remove();

				$.ajax({
					url: '<?php echo base_url('atendimentosLocais/add') ?>',
					type: 'post',
					data: form.serialize(), // /converting the form data into array and sending it to server
					dataType: 'json',
					beforeSend: function() {
						//$('#atendimentoslocaisAddForm-btn').html('<i class="fa fa-spinner fa-spin"></i>');
					},
					success: function(response) {

						if (response.success === true) {
							$('#atendimentoslocaisAddModal').modal('hide');

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
								$('#data_tableatendimentoslocais').DataTable().ajax.reload(null, false).draw(false);
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
						$('#atendimentoslocaisAddForm-btn').html('Adicionar');
					}
				});

				return false;
			}
		});
		$('#atendimentoslocaisAddForm').validate();
	}

	function editatendimentoslocais(codLocalAtendimento) {
		$.ajax({
			url: '<?php echo base_url('atendimentosLocais/getOne') ?>',
			type: 'post',
			data: {
				codLocalAtendimento: codLocalAtendimento
			},
			dataType: 'json',
			success: function(response) {
				// reset the form 
				$("#atendimentoslocaisEditForm")[0].reset();
				$(".form-control").removeClass('is-invalid').removeClass('is-valid');
				$('#atendimentoslocaisEditModal').modal('show');

				$("#atendimentoslocaisEditForm #codLocalAtendimento").val(response.codLocalAtendimento);
				$("#atendimentoslocaisEditForm #descricaoLocalAtendimento").val(response.descricaoLocalAtendimento);
				$("#atendimentoslocaisEditForm #codTipoLocalAtendimento").val(response.codTipoLocalAtendimento);
				$("#atendimentoslocaisEditForm #codStatusLocalAtendimento").val(response.codStatusLocalAtendimento);
				$("#atendimentoslocaisEditForm #codPessoa").val(response.codPessoa);
				$("#atendimentoslocaisEditForm #dataAtualizacao").val(response.dataAtualizacao);

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
						var form = $('#atendimentoslocaisEditForm');
						$(".text-danger").remove();
						$.ajax({
							url: '<?php echo base_url('atendimentosLocais/edit') ?>',
							type: 'post',
							data: form.serialize(),
							dataType: 'json',
							beforeSend: function() {
								//$('#atendimentoslocaisEditForm-btn').html('<i class="fa fa-spinner fa-spin"></i>');
							},
							success: function(response) {

								if (response.success === true) {

									$('#atendimentoslocaisEditModal').modal('hide');


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
										$('#data_tableatendimentoslocais').DataTable().ajax.reload(null, false).draw(false);
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
								$('#atendimentoslocaisEditForm-btn').html('Salvar');
							}
						});

						return false;
					}
				});
				$('#atendimentoslocaisEditForm').validate();

			}
		});
	}

	function removeatendimentoslocais(codLocalAtendimento) {


		Swal.fire({
			position: 'bottom-end',
			icon: 'warning',
			title: 'Não é possivel remover este local de atendimento',
			html: 'Caso necessário, desative-o',
			showConfirmButton: false,
			timer: 4000
		})

		/*
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
				url: '<?php echo base_url('atendimentosLocais/remove') ?>',
				type: 'post',
				data: {
					codLocalAtendimento: codLocalAtendimento
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
							$('#data_tableatendimentoslocais').DataTable().ajax.reload(null, false).draw(false);								
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
		
		*/
	}
</script>