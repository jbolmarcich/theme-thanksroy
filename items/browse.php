<?php head(); ?>
<?php $tag = $_GET['tag']; ?>

	<div id="primary" class="browse">
		<h1>Browse Contributions</h1>
		<ul class="navigation" id="secondary-nav">
			<?php nav(array('Browse All' => uri('items/browse'), 'Browse by Tag' => uri('items/tags'))); ?>
		</ul>
		<?php echo $tag;?>
			<div class="pagination top"><?php echo pagination_links(); ?></div>
			<?php //display_item_list($items,false,false); 
			
			foreach($items as $key => $item): ?>
			<div class="item hentry">
				<div class="item-meta">
				<h3><?php link_to_item($item, 'show', null, array('class'=>'permalink')); ?></h3>
				<?php if(!$title_only):?>

				<?php if(has_thumbnail($item)): ?>
				<div class="item-img">
					<a href="<?php echo uri('items/show/'.$item->id); ?>"><?php echo square_thumbnail($item); ?></a>						
				</div>
				<?php endif; ?>

				<?php if($item->description): ?>
				<div class="desc">
				<?php echo "<p>" . h($item->description) . "</p>"; ?>
				</div>
				<?php endif; ?>
				
				<?php if($text = item_metadata($item,'Text')	): ?>
				<div class="text">
				<?php echo nls2p(snippet(item_metadata($item,'Text'),'0','150')); ?>
				</div>
				<?php endif; ?>

				<?php if(count($item->Tags)): ?>
				<div class="tags"><p><strong>Tags:</strong> 
				<?php foreach ($item->Tags as $tag): ?>
				<a href="<?php echo uri('items/browse/tag/'.$tag->name); ?>" rel="tag"><?php echo h($tag->name); ?></a>
				<?php endforeach; ?>
				</div>
				<?php endif;?>

				<?php endif; ?>
				</div>

				<?php if($display_content):?>
				<div class="item-content"><?php display_item($item); ?></div>
				<?php endif; ?>

			</div>
			<?php endforeach; ?>
			<div class="pagination bottom"><?php echo pagination_links(); ?></div>
			
	</div>
<?php foot(); ?>