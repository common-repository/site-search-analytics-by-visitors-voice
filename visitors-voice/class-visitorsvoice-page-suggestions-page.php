<?php
	/**
	* Page suggestion list class for the Visitors Voice plugin
	* 
	* @author  Pontus Rosin <pontus@visitorsvoice.com>
	* @since 1.0
	* @license: GPLv2 or later
	* @license URI: http://www.gnu.org/licenses/gpl-2.0.html
	*/

	class VisitorsVoice_Page_Suggestions_Page {
	
		private static $instance = null;
		
		public static function get_instance() {
	 
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
	
		public function __construct() {}
		
		public function display_page_suggestion_list() {
		
			if(!class_exists('VisitorsVoicePlugin'))
				require_once( ABSPATH . 'wp-content/plugins/visitors-voice/class-visitorsvoice-plugin.php' );
			
			$visitorsvoiceplugin = VisitorsVoicePlugin::get_instance();
			$rows = $visitorsvoiceplugin->get_page_suggestions_list();
			
			$pages = array();
			$oldpages = array();

			echo '<div class="wrap">';
			echo '<div id="icon-visitorsvoice-page" ><br></div>';
			echo '<h2>'.__("Visitors Voice", "visitorsvoice").'</h2>';
			echo '</br>';

			if(empty($rows))
			{
				_e("Congratulations, all suggestions have been fixed. If you haven't fixed any suggestions, perhaps not enough data has been collected yet.", "visitorsvoice");
				echo "</br></br>";
				_e("Contact our <a href='http://support.visitorsvoice.com/home' target='_blank'>support</a> if you have any questions about this.", "visitorsvoice");
				
				return;
			}
			_e("Many visitors has <a href='http://api.visitorsvoice.com/Home/Glossary#refinement' target='_blank'>refined their searches</a> before they click on the pages below in the <a href='http://api.visitorsvoice.com/Home/Glossary#searchengineresultlist' target='_blank'>search engine hit list</a>.", "visitorsvoice");
			_e("Consider using the initial search terms in your content or as metadata in order to prioritize the pages in the search engine hit list.", "visitorsvoice");
			echo "</br></br>";
			_e("Click on a page below to see the search terms and refinements in order to update your content and metadata.","visitorsvoice");
			$count = 0;
			foreach ( $rows as $row ) 
			{
				if($row->post_id > 0){
					$pages[$count] = get_post($row->post_id);
					$count++;
				} else {
					$oldpages[] = $row;
				}
			}
?>
			</br></br>
			<table class="display" id="page_suggestion_list_table">
				<thead>
					<tr>
						<th><?php _e("Title", "visitorsvoice"); ?></th>
						<th><?php _e("Author", "visitorsvoice"); ?></th>
						<th><?php _e("Pagestatus", "visitorsvoice"); ?></th>
					</tr>
				</thead>
				<tbody>
<?php
					$i=1;
					foreach($pages as $page){
					
						$editlink  = BASE_URL.'/wp-admin/post.php?action=edit&post='.(int)$page->ID;
						$user_info = get_userdata(stripslashes($page->post_author));

						if($i % 2 === 0) echo '<tr class="even gradeX">';
						else echo '<tr class="odd gradeX">';
						
						echo '<td><a href="'.$editlink.'">'.$page->post_title.'</a></td>';						
						echo '<td>'.$user_info->user_login.'</td>';
						echo '<td>'.$page->post_status.'</td>';
						echo '</tr>';
						
						$i++;
					}			
?>
				</tbody>
			</table>
			</br>
			</br>
			</div>
<?php
			
		}
	}