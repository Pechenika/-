
	<?php 
	
	foreach($subcat as $sa):				//подкатегории
		foreach($name_property as $pr):		//свойства
			if($pr['id'] == $sa['id_property']): ?>
						<p><?= $pr['name'] ?></p>
			<?php foreach($values as $value):		//
			foreach($values_prop as $val):
				if($sa['id'] == $val['id_subcat_property']):
					 if($val['id_value'] == $value['id']):
					?>
					<p><input type="checkbox" name="a" value="<?= $value['id'] ?>"> <?= $value['name'] ?></p>
					<?php
					endif;
					endif;
				
			endforeach;
			endforeach;
			endif;
		endforeach;
	endforeach;
	?>