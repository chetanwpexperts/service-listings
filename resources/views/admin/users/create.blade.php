@extends("layouts.master")

@section("content")
<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>
				<span class="udb-inst">Add new user</span>
                 <div class="ud-cen-s2 ud-pro-edit">
                    <h2>User details</h2>
                                          <form name="register_form" id="register_form" method="post" action="../register_update.html" enctype="multipart/form-data" class="">
                         
                         <input type="hidden" autocomplete="off" name="trap_box" id="trap_box" class="validate">
                         <input type="hidden" autocomplete="off" name="mode_path" value="XeBaCk_MoDeX_PATHXHU" id="mode_path" class="validate">

                         <table class="responsive-table bordered">
							<tbody>
								<tr>
                                    <td>Name</td>
									<td>
                                        <div class="form-group">
                                          <input type="text" required="required" autocomplete="off" name="first_name" id="first_name" class="form-control">
                                        </div>
                                    </td>
								</tr>
                                <tr>
                                    <td>Email id</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="email" required="required" autocomplete="off" name="email_id" id="email_id" class="form-control" >
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pofile password</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" autocomplete="off" required="required" name="password" id="password" class="form-control" >
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mobile number</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" required="required" autocomplete="off" name="mobile_number" id="mobile_number" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Profile picture</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="file" name="profile_image" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="user_address">
                                        </div>
                                    </td>
                                </tr>
<!--                                <tr>-->
<!--                                    <td>City</td>-->
<!--                                    <td>-->
<!--                                        <div class="form-group">-->
<!--                                            <input type="text" class="form-control" value="Illunois">-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--                                </tr>-->
                                <tr>
                                    <td>User type</td>
                                    <td>
                                        <div class="form-group">
                                            <select name="user_type" required="required" id="user_type" class="chosen-select form-control ca-check-plan">
                                                <option value="">User type</option>
                                                <option value="General">General user</option>
                                                <option value="Service provider">Service provider</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>User Plan</td>
									<td>
                                        <div class="form-group">
                                            <select name="user_plan" id="user_plan" class="form-control">
                                                <option value="" disabled="disabled" selected="selected">Choose your plan</option>
                                                                                                    <option value="1">Free</option>
                                                                                                        <option value="2">Standard - 9/year</option>
                                                                                                        <option value="3">Premium - 19/year</option>
                                                                                                        <option value="4">Premium Plus - 20/year</option>
                                                                                                </select>
                                        </div>
                                    </td>
								</tr>
<!--                                <tr>-->
<!--                                    <td>Plan start date</td>-->
<!--									<td>-->
<!--                                        <div class="form-group">-->
<!--                                            <input type="text" id="stdate" value="12 Jan 2018" class="form-control">-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--								</tr>-->
<!--                                <tr>-->
<!--                                    <td>Plan expiry date</td>-->
<!--									<td>-->
<!--                                        <div class="form-group">-->
<!--                                          <input type="text" id="endate" value="12 Jan 2018" class="form-control">-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--								</tr>-->
<!--                                <tr>-->
<!--                                    <td>Amount paid</td>-->
<!--									<td>-->
<!--                                        <div class="form-group">-->
<!--                                          <input type="text" class="form-control" value="$250">-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--								</tr>-->
<!--                                <tr>-->
<!--                                    <td>Join date</td>-->
<!--									<td>-->
<!--                                        <div class="form-group">-->
<!--                                          <input type="text" class="form-control" value="12 April 2018">-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--								</tr>-->
<!--                                <tr>-->
<!--                                    <td>Verified</td>-->
<!--									<td>-->
<!--                                        <div class="form-group">-->
<!--                                          <select class="form-control">-->
<!--                                            <option>Yes</option>-->
<!--                                            <option>No</option>-->
<!--                                          </select>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--								</tr>-->
<!--                                <tr>-->
<!--                                    <td>Rating</td>-->
<!--									<td>-->
<!--                                        <div class="form-group">-->
<!--                                          <select class="form-control">-->
<!--                                              <option>1</option>-->
<!--                                              <option>1.5</option>-->
<!--                                              <option>2.0</option>-->
<!--                                              <option>2.5</option>-->
<!--                                              <option>3.0</option>-->
<!--                                              <option>3.5</option>-->
<!--                                              <option>4.0</option>-->
<!--                                              <option>4.5</option>-->
<!--                                              <option>5.0</option>-->
<!--                                          </select>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--								</tr>-->
<!--                                <tr>-->
<!--                                    <td>Premium service provider</td>-->
<!--									<td>-->
<!--                                        <div class="form-group">-->
<!--                                          <select class="form-control">-->
<!--                                            <option>Yes</option>-->
<!--                                            <option>No</option>-->
<!--                                          </select>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--								</tr>-->
                                <tr>
                                    <td>Facebook</td>
									<td>
                                        <div class="form-group">
                                          <input type="text" name="user_facebook" class="form-control" >
                                        </div>
                                    </td>
								</tr>
                                <tr>
                                    <td>Twitter</td>
                                    <td>
                                        <div class="form-group">
                                          <input type="text" name="user_twitter" class="form-control" >
                                        </div>
                                    </td>
								</tr>
                                <tr>
                                    <td>Youtube</td>
                                    <td>
                                        <div class="form-group">
                                          <input type="text" name="user_youtube" class="form-control" >
                                        </div>
                                    </td>
								</tr>
                                <tr>
                                    <td>Website</td>
                                    <td>
                                        <div class="form-group">
                                          <input type="text"  name="user_website" class="form-control" >
                                        </div>
                                    </td>
								</tr>
                                <tr>
                                    <td>
                                        <button type="submit" name="register_submit" class="db-pro-bot-btn">Add User</button>
                                    </td>
									<td></td>
								</tr>
							</tbody>
						</table>
                     </form>
                </div>


                </div>
	
@endsection

@section('scripts')

    <script>
	CKEDITOR.replace('page_description');
	</script>

@stop