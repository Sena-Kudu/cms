<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Haber Listesi
			<a href="<?php echo base_url("news/new_form"); ?>" class="btn pull-right btn-outline btn-primary btn-xs"> <i class="fa fa-plus">Yeni Ekle</i></a>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<?php if(empty($items)) { ?>
				<div class="alert alert-info text-center ">


					<p>Burada herhangi bir veri bulunmamaktadır.Eklemek için lütfen <a href="<?php echo base_url("news/new_form"); ?>">tıklayınız.</a></p>
				</div>
			<?php } else{ ?>

				<table class="table table-hover table-striped content-container table-bordered">
					<thead>
						<th class = "order"><i class = "fa fa-reorder"></i></th>
						<th class = "w50">#id</th>
						<th>Başlık</th>
						<th>url</th>
						<th>Açıklama</th>
						<th>Haber Türü</th>
						<th>Görsel</th>
						<th>Durumu</th>
						<th>İşlem</th>
						<tbody class= "sortable" data-url = "<?php echo base_url("news/rankSetter"); ?>">
							<?php foreach ($items as $items) {
							# code...
								?>	
								<tr id="ord-<?php echo $items->id; ?>">
									<td class = "order"><i class = "fa fa-reorder"></i></td>
									<td class = "w50">#<?php echo $items->id; ?></td>
									<td><?php echo $items->title; ?></td>
									<td><?php echo $items->url; ?></td>
									<td><?php echo $items->description; ?></td>
									<td><?php echo $items->news_type; ?></td>
									<td>
										<?php if($items->news_type == "image"){ ?>

                                             <img width = "100" src="<?php echo base_url("uploads/$viewFolder/$items->img_url"); ?>" alt = "" class="img-rounded">

										<?php } else if($items->news_type == "video") { ?>

											<iframe 
											width="100" 
											 
											src="<?php echo $items->video_url; ?>" 
											frameborder="0" 
											allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
											allowfullscreen></iframe>
											

										<?php } ?>
									</td>
									<td>
										<input 
										data-url="<?php echo base_url("news/isActiveSetter/$items->id");?>"
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
										<button data-url="<?php echo base_url("news/delete/$items->id"); ?>" class="btn btn-outline btn-danger remove-btn">SiL<i class="fa fa-trash"></i></button>

											
												<a href="<?php echo base_url("news/update_form/$items->id") ;?>" class="btn btn-outline btn-info">Düzenle<i class="fa fa-pencil-square-o"></i></a>
												

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