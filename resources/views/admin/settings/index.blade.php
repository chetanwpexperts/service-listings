@extends("layouts.master")

@section("content")
<div class="ud-cen">
    <div class="log-bor">&nbsp;</div>
        <span class="udb-inst">Settings</span>
            <div class="ud-cen-s2 ud-pro-edit">
            <h2>Admin details</h2>
               <form name="setting_form" id="setting_form" method="post" enctype="multipart/form-data" action="{{route('settings.update', [$settings->id])}}">
                @csrf
                <table class="responsive-table bordered">
                    <input type="hidden" autocomplete="off" name="id" value="{{$settings->id}}" id="id" class="validate">
                    <tbody>
                    <tr>
                        <td>Website Name</td>
                        <td>
                            <div class="form-group">
                                <input type="text" name="website_address" value="{{$settings->website_address}}" required="required" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Admin Email [For All Mails] :</td>
                        <td>
                            <div class="form-group">
                                <input type="text" name="admin_primary_email" class="form-control" placeholder="Email" value="{{$settings->admin_primary_email}}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Currency Symbol</td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="currency_symbol" required="required" value="{{$settings->currency_symbol}}" placeholder="[ Note: Please make sure the currency code is correct ]">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Logo

                        @php 
                        $logo = asset('public/images/logo-b.png');
                        if(!empty($websettings) && $websettings['logo'] != "")
                        {
                            $logo = asset('public/public/admin/settings/'.$websettings['logo']);
                        }
                        @endphp
                        <img src="{{ $logo }}" class="setting-imgs">
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" name="header_logo" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="admin_name" value="{{$settings->admin_name}}" placeholder="Name">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>User name</td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="admin_primary_email" value="{{$settings->admin_primary_email}}" placeholder="Enter user name">
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Fav Icon

                        @php 
                        $fav_icon = asset('public/images/logo-b.png');
                        if(!empty($websettings) && $websettings['fav_icon'] != "")
                        {
                            $fav_icon = asset('public/public/admin/settings/'.$websettings['fav_icon']);
                        }
                        @endphp
                        <img src="{{ $fav_icon }}" class="setting-imgs">
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" name="home_page_fav_icon" class="form-control" >
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>SEO Title</td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="admin_seo_title" value="{{$settings->admin_seo_title}}" placeholder="SEO Title for whole website">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>SEO Description</td>
                        <td>
                            <div class="form-group">
                                <textarea class="form-control" required="required" name="admin_seo_description">{{$settings->admin_seo_description}}</textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>SEO Keywords</td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="admin_seo_keywords" value="{{$settings->admin_seo_keywords}}" placeholder="Enter SEO Keywords (i.e) Best Template in the world,Themes,User friendly">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Home page Banner
                        @php 
                        $home_page_banner = asset('public/images/logo-b.png');
                        if(!empty($websettings) && $websettings['home_page_banner'] != "")
                        {
                            $home_page_banner = asset('public/public/admin/settings/'.$websettings['home_page_banner']);
                        }
                        @endphp
                        <img src="{{ $home_page_banner }}" class="setting-imgs">
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" name="home_page_banner"  class="form-control" >
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Login using Google</td>
                        <td>
                            <div class="form-group">
                                <select name="admin_google_login" class="form-control" id="admin_google_login">

                                    <option selected                                                value="1" <?php echo ($settings->admin_google_login == 1) ? "selected" : "";?>>Active</option>
                                    <option value="2" <?php echo ($settings->admin_google_login == 2) ? "selected" : "";?>>Inactive</option>

                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Login using Facebook</td>
                        <td>
                            <div class="form-group">
                                <select name="admin_facebook_login" class="form-control" id="admin_facebook_login">

                                    <option selected                                                value="1" <?php echo ($settings->admin_facebook_login == 1) ? "selected" : "";?>>Active</option>
                                    <option value="2" <?php echo ($settings->admin_facebook_login == 2) ? "selected" : "";?>>Inactive</option>

                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Client ID [Login Using Google] </br></br> <a target="_blank" href="https://developers.google.com/identity/sign-in/web/sign-in">To Create New - Click Here</a></td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="admin_google_client_id" value="{{$settings->admin_google_client_id}}" placeholder="Paste your Google Client Id">
                            </div>
                        </td>
                    </tr>
<!--                            <tr>-->
<!--                                <td>Client Secret [Login Using Google] </br></br> <a target="_blank" href="https://developers.google.com/identity/sign-in/web/sign-in">To Create New - Click Here</a></td>-->
<!--                                <td>-->
<!--                                    <div class="form-group">-->
<!--                                        <input type="text" class="form-control"  name="admin_google_client_secret" value="--><!--" placeholder="Paste your Google Client Secret">-->
<!--                                    </div>-->
<!--                                </td>-->
<!--                            </tr>-->
                    <tr>
                        <td>App Id [Login Using Facebook] </br></br> <a target="_blank" href="https://developers.facebook.com/apps/">To Create New - Click Here</a></td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="admin_facebook_app_id" value="{{$settings->admin_facebook_app_id}}" placeholder="Paste your Facebook APP Id">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Google Geo Map API Key </br></br> <a target="_blank" href="https://developers.google.com/maps/documentation/geocoding/get-api-key">To Create New - Click Here</a></td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="admin_geo_map_api" value="{{$settings->admin_geo_map_api}}" placeholder="Paste your Google Map Api Key">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Map View Default Latitude</td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="admin_geo_default_latitude" value="{{$settings->admin_geo_default_latitude}}" placeholder="Paste your Default Google Map Latitude">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Map View Default Longitude</td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="admin_geo_default_longitude" value="{{$settings->admin_geo_default_longitude}}" placeholder="Paste your Default Google Map Longitude">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Map View Default Zoom Size</td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="admin_geo_default_zoom" value="{{$settings->admin_geo_default_zoom}}" placeholder="Paste your Default Google Map Zoom Size">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Language</td>
                        <td>
                            <div class="form-group">
                                <select name="admin_language" class="form-control" id="admin_language">
                                    <option selected value="1">English</option>
                                    <option value="2">Arabic</option>

                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Countries</td>
                        <td>
                            <div class="form-group">
                                <select name="admin_countries[]" multiple class="chosen-select form-control" id="admin_countries"> 
                                    <?php 
                                    foreach($countries as $country)
                                    {
                                        ?>
                                        <option value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
                                        <?php
                                    }
                                    ?>
                                    <option value="">Add New Country</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Profile picture</td>
                        <td>
                            <div class="form-group">
                                <input type="file" name="admin_photo"  class="form-control" >
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <button type="submit" name="setting_submit" class="db-pro-bot-btn">Submit Changes</button>
                        </td>
                        <td></td>
                    </tr>
                    </tbody>

                </table>
                    </form>
        </div>
    </div>

    @endsection