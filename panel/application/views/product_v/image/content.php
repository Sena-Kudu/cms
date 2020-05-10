<div class="row">
	
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">

				<form action="<?php echo base_url("product/image_upload"); ?>" class="dropzone" data-plugin="dropzone" data-options="{ url: '<?php echo base_url("product/image_upload"); ?>'}">
					<div class="dz-message">
						<h3 class="m-h-lg">Yüklemek istediğiniz resimleri buraya sürükleyiniz.</h3>
						<p class="m-b-lg text-muted">(Yüklemek için dosyalarınızı sürükleyiniz yada buraya tıklayınız)</p>
					</div>
				</form>
			</div><!-- .widget-body -->


		</div><!-- .widget -->
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			<b><?php echo $items->title; ?></b> kaydına ait Resimler
			
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">

				
			</div><!-- .widget-body -->

			<table class= "table table-bordered table-striped table-hover pictures_list">
				<thead>
					<th>#id</th>
					<th>Görsel</th>
					<th>Resim Adı</th>
					<th>Durumu</th>
					<th>İşlem</th>
				</thead>
				<tbody>
				<tr>
					<td class= "w100 text-center">#1</td>
					<td class= "w100 text-center">
						<img width="50" src="https://n11scdn.akamaized.net/a1/217/otomotiv-motosiklet/koltuk-baslik/alfa-romeo-2li-papyon-boyun-yastigi__0992844833120766.jpg" class="img-responsive"></img>
					</td>
					<td>deneme-urunu.jpg</td>
					<td class= "w100 text-center">
						<input 
						data-url="<?php echo base_url("product/isActiveSetter");?>"
						class="isActive" 
						type="checkbox" 
						data-switchery data-color="#10c469" 
						<?php echo (true) ? "checked" : ""; ?>/>

					</td>
					<td class= "w100 text-center" >
						<button data-url="<?php echo base_url("product/delete"); ?>" class="btn btn-outline btn-danger btn-block remove-btn">SiL<i class="fa fa-trash"></i></button>
					</td>
				</tr>
				<tr>
					<td class= "w100 text-center">#1</td>
					<td class= "w100 text-center">
						<img width="50" src="https://n11scdn.akamaized.net/a1/217/otomotiv-motosiklet/koltuk-baslik/alfa-romeo-2li-papyon-boyun-yastigi__0992844833120766.jpg" class="img-responsive"></img>
					</td>
					<td>deneme-urunu.jpg</td>
					<td class= "w100 text-center">
						<input 
						data-url="<?php echo base_url("product/isActiveSetter");?>"
						class="isActive" 
						type="checkbox" 
						data-switchery data-color="#10c469" 
						<?php echo (true) ? "checked" : ""; ?>/>

					</td>
					<td class= "w100 text-center" >
						<button data-url="<?php echo base_url("product/delete"); ?>" class="btn btn-outline btn-danger btn-block remove-btn">SiL<i class="fa fa-trash"></i></button>
					</td>
				</tr>
				
				
				</tbody>

			</table>
			
		</div><!-- .widget -->
	</div>
</div>



