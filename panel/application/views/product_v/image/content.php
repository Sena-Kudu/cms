<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Ürün Fotoğrafları
			
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">

				<form action="../api/dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '../api/dropzone'}">
					<div class="dz-message">
						<h3 class="m-h-lg">Drop files here or click to upload.</h3>
						<p class="m-b-lg text-muted">(This is just a demo dropzone. Selected files are not actually uploaded.)</p>
					</div>
				</form>
			</div><!-- .widget-body -->


		</div><!-- .widget -->
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Ürün Fotoğrafları
			
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">

				
			</div><!-- .widget-body -->

			<table class= "table table-bordered table-striped table-hover">
				<thead>
					<th>#id</th>
					<th>Görsel</th>
					<th>Resim Adı</th>
					<th>Durumu</th>
					<th>İşlem</th>
				</thead>
				<tr>
					<td>#1</td>
					<td>
						<img width="50" src="https://lh3.googleusercontent.com/proxy/K2-wjycHqq_calNitH2IysGp54YqidkNL3tgt5yvnL0jkemr0U8sjjILG5uLSLyGmUjX6IcfiY-MuyfjUz0mqhsKNOjbq7kKUfoVKGyUAjFfu9wpeVw7gF0Fpdz30Iz8LOE_WU9pLkyNqd-V" class="img-responsive"></img>
					</td>
					<td>deneme-urunu.jpg</td>
					<td>
						<input 
						data-url="<?php echo base_url("product/isActiveSetter");?>"
						class="isActive" 
						type="checkbox" 
						data-switchery data-color="#10c469" 
						 <?php echo (true) ? "checked" : ""; ?>/>

					</td>
					<td>
						<button data-url="<?php echo base_url("product/delete"); ?>" class="btn btn-outline btn-danger remove-btn">SiL<i class="fa fa-trash"></i></button>
					</td>
				</tr>
				<tr>
					<td>#1</td>
					<td>
						<img width="50" src="https://lh3.googleusercontent.com/proxy/K2-wjycHqq_calNitH2IysGp54YqidkNL3tgt5yvnL0jkemr0U8sjjILG5uLSLyGmUjX6IcfiY-MuyfjUz0mqhsKNOjbq7kKUfoVKGyUAjFfu9wpeVw7gF0Fpdz30Iz8LOE_WU9pLkyNqd-V" class="img-responsive"></img>
					</td>
					<td>deneme-urunu.jpg</td>
					<td>
						<input 
						data-url="<?php echo base_url("product/isActiveSetter");?>"
						class="isActive" 
						type="checkbox" 
						data-switchery data-color="#10c469" 
						 <?php echo (true) ? "checked" : ""; ?>/>

					</td>
					<td>
						<button data-url="<?php echo base_url("product/delete"); ?>" class="btn btn-outline btn-danger remove-btn">SiL<i class="fa fa-trash"></i></button>
					</td>
				</tr>
				<tr>
					<td>#1</td>
					<td>
						<img width="50" src="https://lh3.googleusercontent.com/proxy/K2-wjycHqq_calNitH2IysGp54YqidkNL3tgt5yvnL0jkemr0U8sjjILG5uLSLyGmUjX6IcfiY-MuyfjUz0mqhsKNOjbq7kKUfoVKGyUAjFfu9wpeVw7gF0Fpdz30Iz8LOE_WU9pLkyNqd-V" class="img-responsive"></img>
					</td>
					<td>deneme-urunu.jpg</td>
					<td>
						<input 
						data-url="<?php echo base_url("product/isActiveSetter");?>"
						class="isActive" 
						type="checkbox" 
						data-switchery data-color="#10c469" 
						 <?php echo (true) ? "checked" : ""; ?>/>

					</td>
					<td>
						<button data-url="<?php echo base_url("product/delete"); ?>" class="btn btn-outline btn-danger remove-btn">SiL<i class="fa fa-trash"></i></button>
					</td>
				</tr>

			</table>
			
		</div><!-- .widget -->
	</div>
</div>



