<?php

class pluginItemsPerPage extends Plugin {

        public function init()
        {
                $this->dbFields = array(
                        'items-per-page'=>'10'
                );
        }

        public function form()
        {
                global $L;

                $html = '<div>';
                $html .= '<label for="items-per-page">'.$L->get('Items per page').'</label>';
                $html .= '<input type="text" name="items-per-page" value="'.$this->getValue('items-per-page').'" style="width:10%">';
                $html .= '</div>';
                return $html;
        }

		public function adminBodyEnd()
		{
				global $site;

				$items = $this->getValue('items-per-page');

        		$html = PHP_EOL.'<script>'.PHP_EOL;

	        	if ($site->itemsPerPage() == $items){
	 				$html .= '$("#jsitemsPerPage").append(`<option value="'.$items.'" selected>'.$items.'</option>`);'.PHP_EOL;
				}
				else {
					$html .= '$("#jsitemsPerPage").append(`<option value="'.$items.'">'.$items.'</option>`);'.PHP_EOL;
				}

 				$html .= '</script>'.PHP_EOL;
 				return $html;
    	}

}
