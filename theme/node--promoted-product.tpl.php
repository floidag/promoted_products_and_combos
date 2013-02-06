<article<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
	  <?php hide($content['field_ref_product_display']); ?>
  	<?php print render($content['field_promoted_image']) ?>
		<header>
		  <h2>
		    <div>
		      <a href="/node/<?php print $content['field_ref_product_display'][0]['#markup'] ?>"><?php print $title ?></a>
		    </div>
		  </h2>

		  <div>
		    <h3><?php print render($content['field_subtitle']) ?></h3>
		  </div>
		</header>
  <?php endif; ?>  
  
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
</article>