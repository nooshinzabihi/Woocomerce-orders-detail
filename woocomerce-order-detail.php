<?php
//----swiper slider of woocomerce orders with details
function customer_order_slide() {
    $customer = ' <div class="c-promo-single__headline js-promo-single-bar is-active"> Sample </div> <div class="swiper-container recent-orders">
			<div class="swiper-wrapper">';
    $orders = wc_get_orders( array('numberposts' => -1) );
    
	foreach( $orders as $order )if($tmp++ < 4){
	  
	    $order_item_id = $order->get_id();
        $orderss = wc_get_order($order_item_id);
        $items = $order->get_items();
		$customer .= '<div class="swiper-slide">
			<div class="swipe-item ">
			    <div class="recent-order-item">
    				<div class="recent-order">
        				<div class="customer_order_details">
        				    <span>
        				    <strong>'.$order->get_billing_first_name().'
            				    </strong></br>';
            foreach($items as $item){
                $innerItem = $item->get_data();
                $productorder_id= $innerItem['product_id'];
                $image = wp_get_attachment_image_src( get_post_thumbnail_id(  $productorder_id ), 'single-post-thumbnail' );
                $product = wc_get_product( $productorder_id );
                $permalink = $product->get_permalink();
                
               $customer .= ' is reading a  <a href="'.$permalink.'">'.$innerItem['name'].'</a> now.</span></div>
            				<div class="customer_order_city">
            				<span class="order_city"> City '. $order->get_billing_city() .'</span>
            				</div>
        				</div>
        				<div class="image-order">
        				    <a href="'.$permalink.'" target="_blank"><img src="'.$image[0].'" /></a>
        				</div>
    				</div>
    				
				</div>
			</div>';
                break;
            }
			
	}
	
	$customer .= '</div><div class="swiper-pagination"></div></div>'	;
	return $customer;
}
add_shortcode('customerslide', 'customer_order_slide');

?>