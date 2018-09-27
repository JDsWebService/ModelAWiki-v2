<?php

namespace App\Traits;

trait SocialMediaTrait {

	// Get the associated Social Media Site Icon
	protected function getIcon($site) {
	    switch($site) {
	        case 'facebook':
	            return '/images/icons/facebook.png';
	            break;
	        case 'google':
	            return '/images/icons/google-plus.png';
	            break;
	        case 'instagram':
	            return '/images/icons/instagram.png';
	            break;
	        case 'pinterest':
	            return '/images/icons/pinterest.png';
	            break;
	        case 'twitter':
	            return '/images/icons/twitter.png';
	            break;
	    }
	}

	// Validate the link contains the site
	protected function validateLink($link, $site) {

	    if(strpos($link, $site) == true) {
	        return true;
	    }

	    Session::flash('danger', 'Your link isn\'t a ' . $site . ' link!');

	    return false;

	}

	
}
