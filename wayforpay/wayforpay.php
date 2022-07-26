<?php
/**
 * Plugin Name: Модуль WayForPay
 * Description: Payment gateway
 * Plugin URI:  t.me/svi_pl
 * Author URI:  Milvus.agency
 * Author: Vitaliy Milvus
 * Version: 1.0
 *
 * Requires at least: 3.0
 * Requires PHP: 7.0
 *
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: https://t.me/svi_pl
 */

if ( ! defined( 'ABSPATH' ) ) exit;
  
function wayforpay_pay_form(){
	ob_start();
	include_once('template/form.php');
	return ob_get_clean();
		}

add_shortcode('pay_form', 'wayforpay_pay_form');

function wayforpay_resp_form(){
	ob_start();
	include_once('template/response.php');
	return ob_get_clean();
		}

add_shortcode('pay_response', 'wayforpay_resp_form');