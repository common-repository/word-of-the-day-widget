<?php
 /*
 Plugin Name: Word of the day
 Plugin URI: http://www.onlinewebhosting.info
 Description: Wordpress widget for Dictionary.com's Word of the day widget
 Author: Online Web Hosting
 Version: 1
 Author URI: http://www.onlinewebhosting.info
 */
function wordOfTheDayWidget_control() {
	$options = get_option("widget_wordOfTheDayWidget");
	
	if (!is_array( $options )){
		$options = array(
			'title' => 'Word of the Day',
			'style' => 'dict_blue'
		);
	}
	
	if ($_POST['wordOfTheDayWidget_submit']) {
		$options['title'] = htmlspecialchars($_POST['wordOfTheDayWidget_title']);
		$options['style'] = htmlspecialchars($_POST['wordOfTheDayWidget_style']);
		
		update_option("widget_wordOfTheDayWidget", $options);
	}
	
	?>
		<div>
			<label for="sideFeature-WidgetTitle">Title: </label><br />
			<input class="widefat" type="text" name="wordOfTheDayWidget_title" value="<?php echo $options['title'];?>" />
		</div>
		<div>
			<label>Style: </label>
			<select name="wordOfTheDayWidget_style">
				<option value="dict_blue" <?php echo ($options['style'] == 'blue') ? 'selected' : ''; ?>>Blue</option>
				<option value="green" <?php echo ($options['style'] == 'green') ? 'selected' : ''; ?>>Green</option>
				<option value="red" <?php echo ($options['style'] == 'red') ? 'selected' : ''; ?>>Red</option>
				<option value="yellow" <?php echo ($options['style'] == 'yellow') ? 'selected' : ''; ?>>Yellow</option>
				<option value="chrome" <?php echo ($options['style'] == 'chrome') ? 'selected' : ''; ?>>Chrome</option>
				<option value="purple" <?php echo ($options['style'] == 'purple') ? 'selected' : ''; ?>>Purple</option>
				<option value="bubbles" <?php echo ($options['style'] == 'bubbles') ? 'selected' : ''; ?>>Bubbles</option>
				<option value="flowerpower" <?php echo ($options['style'] == 'flowerpower') ? 'selected' : ''; ?>>Flower Power</option>
				<option value="droplets" <?php echo ($options['style'] == 'droplets') ? 'selected' : ''; ?>>Droplets</option>
				<option value="satin" <?php echo ($options['style'] == 'satin') ? 'selected' : ''; ?>>Satin</option>
				<option value="rainbow" <?php echo ($options['style'] == 'rainbow') ? 'selected' : ''; ?>>Rainbow</option>
				<option value="metal" <?php echo ($options['style'] == 'metal') ? 'selected' : ''; ?>>Metal</option>
			</select>
		</div>
		<div>
			<input type="hidden" name="wordOfTheDayWidget_submit" value="1" />
		</div>
<?php
} 

function widget_wordOfTheDayWidget($args) {
   extract($args);
   $options = get_option("widget_wordOfTheDayWidget");  
   echo $before_widget;
   echo $before_title;
   echo $options['title'];
   echo $after_title;
?>
<div id="wordoftheday">Word of the day widget by <a href="http://www.dictionary.com"><strong>Dictionary.com</strong></a>. Wordpress widget built by <a href="http://www.onlinewebhosting.info"><strong>Online Web Hosting</strong></a>.</div>
<script type="text/javascript">
document.getElementById('wordoftheday').innerHTML = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="250" height="180" id="wordoftheday_widget" align="middle"><param name="allowScriptAccess" value="sameDomain" /><param name="movie" value="http://dictionary.reference.com/wordoftheday/widget/wotd_widget.swf?r=74&skin=<?php echo $options['style']; ?>" /><param name="loop" value="false" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" /><embed src="http://dictionary.reference.com/wordoftheday/widget/wotd_widget.swf?r=74&skin=<?php echo $options['style']; ?>" loop="false" menu="false" quality="high" bgcolor="#ffffff" width="250" height="180" name="wordoftheday_widget" align="middle" allowScriptAccess="allow" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>';
</script>
<?php
   echo $after_widget;
 }

function wordOfTheDayWidget_init()
 {
   register_sidebar_widget(__('Word of the Day'), 'widget_wordOfTheDayWidget');
   register_widget_control( 'Word of the Day', 'wordOfTheDayWidget_control');    
 }
 add_action("plugins_loaded", "wordOfTheDayWidget_init");
 
?>