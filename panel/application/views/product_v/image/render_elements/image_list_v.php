<?php if(empty($item_images)) { ?>
	<div class="alert alert-info text-center ">


		<p>Burada herhangi bir veri bulunmamaktadır.</p>
	</div>
<?php } else{ ?>

<table class= "table table-bordered table-striped table-hover pictures_list">
<thead>
<th><i class = "fa fa-reorder"></i></th>
<th>#id</th>
<th>Görsel</th>
<th>Resim Adı</th>
<th>Durumu</th>
<th>Kapak</th>
<th>İşlem</th>
</thead>
<tbody class = "sortable" data-url = "<?php echo base_url("product/imageRankSetter"); ?>">
<?php foreach ($item_images as $image) { ?>

<tr id="ord-<?php echo $image->id; ?>">

<td><i class = "fa fa-reorder"></i></td>
<td class= "w100 text-center"><?php echo $image->id; ?></td>
<td class= "w100 text-center">
<img width="50" src="<?php echo base_url("uploads/{$viewFolder}/$image->img_url"); ?>" alt = "<?php echo $image->img_url; ?>" class="img-responsive"></img>
</td>
<td><?php echo $image->img_url; ?></td>
<td class= "w100 text-center">
<input 
data-url="<?php echo base_url("product/imageIsActiveSetter/$image->id");?>"
class="isActive" 
type="checkbox" 
data-switchery data-color="#10c469" 
<?php echo ($image->isActive) ? "checked" : ""; ?>/>
<td class= "w100 text-center">
<input 
data-url="<?php echo base_url("product/isCoverSetter/$image->id/$image->product_id");?>"
class="isCover" 
type="checkbox" 
data-switchery data-color="#ff5b5b" 
<?php echo ($image->isCover) ? "checked" : ""; ?>/>

</td>
<td class= "w100 text-center" >
<button data-url="<?php echo base_url("product/delete"); ?>" class="btn btn-outline btn-danger btn-block remove-btn">SiL<i class="fa fa-trash"></i></button>
</td>

</tr>

<?php } ?>

</tbody>

</table>
<?php 
} ?>