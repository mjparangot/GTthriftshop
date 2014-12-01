<?
	function createItems($items) {
		$no_image = false;
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
								$no_image = true;
						?>
								<li class="no-image"></li>
					<?
							}
						}
					?>
					</ul>
				</li>

				<!-- Item description -->
				<?
				if ($no_image) {
				?>
					<a href="<?=$item["postlink"]?>" target="_blank"><li class="item-description border-rounded-top" href="<?=$item["postlink"]?>"><?= $item['description'] ?></li></a>
				<?
				} else {
				?>
					<a href="<?=$item["postlink"]?>" target="_blank"><li class="item-description" href="<?=$item["postlink"]?>"><?= $item['description'] ?></li></a>
				
				<!-- Date posted -->
				<? 
				}
				$date = new DateTime($item['startdate']);

				if ($no_image || $item['price'] == 0) {
				?>
					<li class="date-posted description border-rounded-bottom">Posted on <?= date_format($date,'m/d/Y') ?></li>
				<?
				} else {
				?>
					<li class="date-posted description">Posted on <?= date_format($date,'m/d/Y') ?></li>
				<!-- Item price -->
				<? 
				}
				
				if ($item['price'] > 0) {
					echo '<li class="price item-price">$'.$item['price'].'</li>';
				}
				else {
					$price = '';
					if ($item['price'] < 0)
						$price = '$'.abs($item['price']).'+';
					else
						$price = '$'.$item['price'];
						
					if ($item['price'] != 0)
						echo '<li class="price item-price">'.$price.'</li>';
				}
				?>
			</ul>
		</li>
<?
		}
	}
?>
