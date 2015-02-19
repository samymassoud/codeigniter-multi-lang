<?php

class LanguageLoader {
	/**
	 * This method work as this :
	 *  - First : check url segment for any lang. code in it i.e (/en) , if so it loads specified language
	 *  - Second : if no lang in url check if this is a return user then load his choosen lang.
	 *  - Finally : if none of the above load system configured default lang 
	 *  @TODO : if user didn't choose load lang from his browser first .
	 *  @author: Original code for this method from tutorial on internet i can't find it right now
	 *  Further development : Samy massoud <SamyMassoud@gmail.com>
	 *  @Website : www.deploy2cloud.com
	 * */
    function initialize() {
        $ci = & get_instance();
        //Do nothing if CI object is not here
        if($ci == null){
            return;
        }
        
        $ci->load->helper('language');
        $url_lang = $ci->uri->segment(1);
        
        //Uncomment this if you want admin panel with one language
        //if($url_lang == 'admin'){
          //  return; //Don't use in admin
        //}
        
        $system_lang = $ci->config->item('system_lang');
        if (isset($system_lang[$url_lang])) {
            //Load Language File automatically and switch it
            $ci->lang->load('general', $system_lang[$url_lang]);
            $ci->session->set_userdata('site_lang',$system_lang[$url_lang]);
            /*Change config language (Don't forget to copy system lang 
            file to your non english lang folder ie. Database and form language */
            $ci->config->set_item('language', $system_lang[$url_lang]);
        } else {
			//priority to language in session
            $site_lang = $ci->session->userdata('site_lang');
            if ($site_lang) {
                $ci->lang->load('general', $ci->session->userdata('site_lang'));
                $ci->config->set_item('language', $ci->session->userdata('site_lang'));
                redirect(base_url(array_search($site_lang,$system_lang).'/'.$ci->uri->uri_string(),'301'));
            } else {
                $ci->lang->load('general', $ci->config->item ('language'));
                $ci->config->set_item('language', $ci->config->item ('language'));
                redirect(base_url($ci->config->item ('short_language').'/'.$ci->uri->uri_string(),'301'));
            }
        }
    }

}
