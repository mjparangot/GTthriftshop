<?
	function createItems($items) {
		foreach ($items as $item) {
?> 
		<li class="sale-item">
			<ul class="pricing-table" href="<?=$item['postlink']?>" target="_blank">
				<!-- Item image(s) -->
				<li>
					<ul class="image-orbit" data-orbit>
					<?
						$array_of_pics = array();

						if ($item['picture'] == '')
							$array_of_pics[] = 'http://dummyimage.com/600x50/000/ffffff.jpg&text=+';
						// else if it's an album of pics
						else if (strpos($item['picture'], ',') !== FALSE) {
							$array_of_pics = explode(',', $item['picture']);
						} else {
							$array_of_pics[] = $item['picture'];
						}

						foreach ($array_of_pics as $pic) {
							if ($pic == '')
								continue;

							if (strpos($pic, '://') === FALSE) {
								$url = "https://graph.facebook.com/".$pic."/picture"; 
					?>
								<li class="item-image">
									<img src="<?= $url ?>">
										<a href="<?=$item["postlink"]?>" target="_blank" class="button radius round view-post-btn">View Post</a>
										<div class="dim-overlay"></div>
									</img>
								</li>
						<?
							}
							else {
								$url = $pic;
						?>
								<li class="no-image"></li>
					<?
							}
						}
					?>
					</ul>
				</li>

				<!-- Item description -->
				<a href="<?=$item["postlink"]?>" target="_blank"><li class="description" href="<?=$item["postlink"]?>"><?= $item['description'] ?></li></a>

				<!-- Item price -->
				<? 
				if ($item['price'] != -1 && $item['price'] != 0)
					echo '<li class="price">$'.$item['price'].'</li>';
				
				$price = '';
				if ($item['price'] < 0)
					$price = '$'.abs($item['price']).'+ (varies)';
				else
					$price = '$'.$item['price'];
					
				if ($item['price'] != 0)
					echo '<li class="price">'.$price.'</li>';
				?>
			</ul>
		</li>
<?
		}
	}
?>
