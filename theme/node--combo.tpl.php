<?php //dsm($content) ?>
<article<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
	<?php hide($content['field_ref_product_display']); ?>
	<div<?php print $content_attributes; ?>>
  		<?php print render($content['field_promoted_image']) ?>
			<header>
		  	<h2>
		    	<div>
						<?php if (!$page): ?>
							<a href="<?php print $node_url ?>"><?php print $title ?></a>
						<?php else: ?>
							<?php print $title ?>
						<?php endif ?>
		      	
		    	</div>
		  	</h2>

		  	<div>
		    	<h3><?php print render($content['field_subtitle']) ?></h3>
		  	</div>
			</header>
  
  
    	<?php
      // We hide the comments and links now so that we can render them later.
      	hide($content['comments']);
      	hide($content['links']);
				hide($content['field_ref_products_combo']);
      	print render($content);
			
			
    		?>
				<table class="cols-3">
					<tbody>
						<tr>
						<?php foreach ($content['field_ref_products_combo'] as $i => $item): ?>
							<?php if (is_int($i)): ?>
		      
		          		<td <?php if (($i+1) % 3 == 0) { print ' class="col-last"';} ?>>
		            		<?php print render($item); ?>
		          		</td>
									<?php if (($i+1) % 3 == 0) { print '</tr><tr>';} ?>
		      
								<?php endif ?>
		    			<?php endforeach; ?>
						</tr>
					</tbody>
				</table>
  </div>
  
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
</article>