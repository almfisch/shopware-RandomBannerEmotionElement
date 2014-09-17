/**
 * Shopware 4.0
 * Copyright © 2012 shopware AG
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
 *
 * @category   Shopware
 * @package    UserManager
 * @subpackage Controller
 * @copyright  Copyright (c) 2012, shopware AG (http://www.shopware.de)
 * @version    $Id$
 * @author shopware AG
 */

//{namespace name=backend/emotion/view/detail}

/**
 * Shopware UI - Emotion Main Controller
 *
 * This file contains the business logic for the Emotion module.
 */
//{block name="backend/emotion/controller/detail"}
Ext.define('Shopware.apps.Emotion.controller.RandomBannerDetail', {

    /**
     * Extend from the standard ExtJS 4 controller
     * @string
     */
	override: 'Shopware.apps.Emotion.controller.Detail',

    getFieldData: function(field, record) {
        if (field.getName() === 'bannerMapping') {
            return {
                id: field.fieldId,
                type: field.valueType,
                key: field.getName(),
                value: record.get('mapping')
            };
        } else if(field.getName() === 'banner_slider') {
            return {
                id: field.fieldId,
                type: field.valueType,
                key: field.getName(),
                value: record.get('mapping')
            };
        } else if(field.getName() === 'random_banner') {
            return {
                id: field.fieldId,
                type: field.valueType,
                key: field.getName(),
                value: record.get('mapping')
            };
        } else if(field.getName() === 'selected_manufacturers') {
            return {
                id: field.fieldId,
                type: field.valueType,
                key: field.getName(),
                value: record.get('mapping')
            };
        } else if(field.getName() === 'selected_articles') {
            return {
                id: field.fieldId,
                type: field.valueType,
                key: field.getName(),
                value: record.get('mapping')
            };
        } else {
            return {
                id: field.fieldId,
                type: field.valueType,
                key: field.getName(),
                value: field.getValue()
            };
        }
    }
});
//{/block}
