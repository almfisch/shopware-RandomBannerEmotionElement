<?php
/**
 * Shopware 4.0
 * Copyright © 2013 shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

use Shopware\Components\Model\Query\SqlWalker;

/**
 * @category  Shopware
 * @package   Shopware\Controllers\Widgets
 * @copyright Copyright (c) 2013, shopware AG (http://www.shopware.de)
 */
class Shopware_Controllers_Widgets_RandomBannerEmotion extends Enlight_Controller_Action
{
    private function getRandomBanner($data, $category, $element)
    {
    	$num = rand(0, count($data['random_banner']) - 1);
    	$data['random_banner'] = $data['random_banner'][$num];

    	if(!empty($data['random_banner']['link']))
    	{
        	preg_match('/^(http|https):\/\//', $data['random_banner']['link'], $matches);

            if(empty($matches))
            {
            	$matches['link'] = $this->Request()->getBaseUrl() . $data['random_banner']['link'];
            }
        }

        return $data;
    }
}
