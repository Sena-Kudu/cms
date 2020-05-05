<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Ürün Listesi
			<a href="<?php echo base_url("product/new_form"); ?>" class="btn pull-right btn-outline btn-primary btn-xs"> <i class="fa fa-plus">Yeni Ekle</i></a>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<?php if(empty($items)) { ?>
				<div class="alert alert-info text-center ">


					<p>Burada herhngi bir veri bulunmamaktadır.Eklemek için lütfen <a href="<?php echo base_url("product/new_form"); ?>">tıklayınız.</a></p>
				</div>
			<?php } else{ ?>

				<table class="table table-hover table-striped">
					<thead>
						<th>#id</th>
						<th>url</th>
						<th>Başlık</th>
						<th>Açıklama</th>
						<th>Durumu</th>
						<th>İşlem</th>
						<tbody>
							<?php foreach ($items as $items) {
							# code...
								?>	
								<tr>
									<td><?php echo $items->id; ?></td>
									<td><?php echo $items->url; ?></td>
									<td><?php echo $items->title; ?></td>
									<td><?php echo $items->description; ?></td>
									<td>
										<input 
										data-url="<?php echo base_url("product/isActiveSetter/$items->id");?>"
										class="isActive" 
										type="checkbox" 
										data-switchery data-color="#10c469" 
										<?php if($items->isActive == "1"){ 

											echo "checked"; /*Buradaki "checked" komutu aktifliği sağlar.Veritabanındaki 0/1 değerlerine göre buradaki aktiflik belirlendi. */
										} 
										else { echo "";}
										?> />

									</td>
									<td>
										<button data-url="<?php echo base_url("product/delete/$items->id"); ?>" class="btn btn-outline btn-danger remove-btn">SiL<i class="fa fa-trash"></i></button>

											
												<a href="<?php echo base_url("product/update_form/$items->id") ;?>" class="btn btn-outline btn-info">Düzenle<i class="fa fa-pencil-square-o"></i></a>

											</td>
										</tr>
									<?php } ?>
								</tbody>
							</thead>
						</table>
					<?php } ?>
				</div><!-- .widget -->
			</div>
			<!-- END column -->
		</div>